<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\backend\Batches;
use App\Models\backend\Chapters;
use App\Models\backend\Subjects;
use App\Models\backend\Topics;
use App\Models\backend\Admin;
use App\Models\frontend\Student;
use App\Models\frontend\StudentPurchase;
use App\Models\frontend\SolutionTransaction;
use Carbon\Carbon;
use Session;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Spatie\Permission\Models\Role;


class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function batchPurchasedReport()
    {
        $batches = Batches::pluck('batch_name','batch_id');
        $students = Student::pluck('student_name','student_id');
        $purchases = array();
        if(isset($_GET) && count($_GET) > 0){
            $purchases_query = StudentPurchase::with('product','student','payment');
            if(isset($_GET['from_date']) && $_GET['from_date'] != ""){
                $purchases_query->where('created_at','>=', date('Y-m-d', strtotime(str_replace('/','-', $_GET['from_date']))).' 00:00:00');
            }

            if(isset($_GET['to_date']) && $_GET['to_date'] != ""){
                $purchases_query->where('created_at','<=', date('Y-m-d', strtotime(str_replace('/','-', $_GET['to_date']))).' 23:59:59');
            }

            if(isset($_GET['package_id']) && $_GET['package_id'] != ""){
                 $purchases_query->where('product_id',$_GET['package_id']);
            }


            if(isset($_GET['student_id']) && $_GET['student_id'] != ''){
                $purchases_query->where('student_id',$_GET['student_id']);
            }
            $purchases = $purchases_query->orderBy('student_purchase_id','desc')->get();


        }
        return view('backend.reports.student_purchases', compact('batches','students','purchases'));
    }


    public function studentSheetsReport(){
        $batches = Batches::pluck('batch_name','batch_id');
        $students = Student::pluck('student_name','student_id');
        $checker_role = Role::where('name','like','checker')->pluck('id');
        $checkers_data = Admin::whereIN('role',$checker_role)->get();
        $checkers = Collect($checkers_data)->MapWithKeys(function($checker,$id){
            return [$checker->id=>(isset($checker->first_name)?$checker->first_name:'').' '.(isset($checker->last_name)?$checker->last_name:'')];
        });

        $submissions = array();

        if(isset($_GET) && count($_GET) > 0){
            $submissions_query =  SolutionTransaction::with('student','package','checker','filename');
            if(isset($_GET['from_date']) && $_GET['from_date'] != ""){
                $submissions_query->where('created_at','>=', date('Y-m-d', strtotime(str_replace('/','-', $_GET['from_date']))).' 00:00:00');
            }

            if(isset($_GET['to_date']) && $_GET['to_date'] != ""){
                $submissions_query->where('created_at','<=', date('Y-m-d', strtotime(str_replace('/','-', $_GET['to_date']))).' 23:59:59');
            }

            if(isset($_GET['package_id']) && $_GET['package_id'] != ""){
                 $submissions_query->where('product_id',$_GET['package_id']);
            }


            if(isset($_GET['student_id']) && $_GET['student_id'] != ''){
                $submissions_query->where('student_id',$_GET['student_id']);
            }
            if(isset($_GET['checker_id']) && $_GET['checker_id'] != ''){
                $submissions_query->where('checked_by',$_GET['checker_id']);
            }
            if(isset($_GET['status']) && $_GET['status'] != ''){
                $submissions_query->where('status',$_GET['status']);
            }

            $submissions = $submissions_query->orderBy('id','desc')->get();
        }
        return view('backend.reports.checkings_report',compact('batches','students','submissions','checkers'));
    }

}
