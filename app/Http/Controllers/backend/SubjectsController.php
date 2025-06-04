<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\backend\Batches;
use App\Models\backend\Subjects;
use Carbon\Carbon;
use Session;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class SubjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id=null)
    {
        //$id nothing but batch_id
        $batch = array();
        if(!is_null($id)){
            $batch = Batches::with('subjects')->where('batch_id', $id)->first();
            $subjects = Subjects::where('batch_id', $id)->get();
        }else{
            $subjects = Subjects::get();

        }

        return view('backend.subjects.index', compact('batch','subjects','id'));
    }

    public function create($id)
    {
        //id is batch id
        return view('backend.subjects.create',compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required',
        ]);

        $batch = new Subjects;
        $batch->fill($request->all());
        if ($batch->save()) {
            return redirect()->route('admin.subjects',[$request->batch_id])->with('success', 'New Subject Has Been Added');
        } else {
            return redirect()->route('admin.subjects',[$request->batch_id])->with('error', 'Unable to Create Subject');
        }
    }

    public function edit($id)
    {
        if ($id != '' && $id != '') {
            $subjects = Subjects::where('subject_id', $id)->first();
            if ($subjects) {
                return view('backend.subjects.edit', compact('subjects'));
            } else {
                return redirect()->route('admin.subjects',[$id])->with('error', 'Subject not Found');
            }
        } else {
            return redirect()->route('admin.subjects',[$id])->with('error', 'Invalid Request');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'subject_name' => 'required',
        ]);

        $subject = Subjects::where('subject_id', $request->subject_id)->first();
        if ($subject) {
            $old =Subjects::where('subject_id', $request->subject_id)->first();
            $subject->fill($request->all());
            if ($subject->save()) {

                return redirect()->route('admin.subjects',[$subject->batch_id])->with('success', 'Subject Has Been Updated');
            } else {
                return redirect()->route('admin.subjects',[$subject->batch_id])->with('error', 'Unable to Update Subject');
            }
        } else {
            return redirect()->route('admin.batches')->with('error', 'Something got wrong');
        }
    }

    public function delete($id)
    {
        $subject = Subjects::where('subject_id', $id)->first();
        if ($subject) {
            $log_batch = Batches::where('batch_id', $subject->batch_id)->first();
            if ($subject->delete()) {
                return redirect()->route('admin.subjects',[$subject->batch_id])->with('error', 'Subject Has  been deleted');
            } else {
                return redirect()->route('admin.subjects',[$subject->batch_id])->with('info', 'Unable to delete Subjects');
            }
        } else {
            return redirect()->route('admin.batches')->with('info', 'Something got wrong');
        }
    }
}
