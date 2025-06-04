<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BackendMenuController;
use App\Http\Controllers\backend\BackendSubMenuController;
use App\Http\Controllers\backend\RolesController;

//Application
use App\Http\Controllers\backend\BatchesController;
use App\Http\Controllers\backend\SubjectsController;
use App\Http\Controllers\backend\ChaptersController;
use App\Http\Controllers\backend\FunctionsController;
use App\Http\Controllers\backend\PackagesController;
use App\Http\Controllers\frontend\GuestController;
use App\Http\Controllers\backend\QuestionPaperFormateController;
use App\Http\Controllers\backend\QuestionsController;
use App\Http\Controllers\backend\TopicsController;
use App\Http\Controllers\backend\QuestionPapersController;
use App\Http\Controllers\backend\BackendContactUsController;
use App\Http\Controllers\backend\PaymentsController;
use App\Http\Controllers\backend\StudentSheetsController;
use App\Http\Controllers\backend\StudentUsersController;
use App\Http\Controllers\backend\FreeExamsController;
use App\Http\Controllers\backend\SamplePaymentsController;
use App\Http\Controllers\backend\ReportsController;
//frontend
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\OrdersController;
use App\Http\Controllers\frontend\StudentController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\StudentExamsController;

//frontend


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/////////////////
 ///FRONTEND/////
 ///////////////
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
    return redirect()->route('admin.login');
})->name('home');

/////////////////
 ///Admin/////
 ///////////////
//Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin'], function () {
    Route::view('/', 'backend.login')->name('admin.login');
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::view('/login', 'backend.login')->name('admin.login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.auth');
    });
      Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

         //update profile
         Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.user.profile');
         Route::post('/updateprofile', [AdminController::class, 'AdminProfileUpdate'])->name('admin.user.profile.update');

         //Update password
         Route::get('/password', [AdminController::class, 'changePassword'])->name('admin.user.changepassword');
         Route::post('/password/update', [AdminController::class, 'UpdatePassword'])->name('admin.user.updatepassword');

        //create backend menu
        Route::get('backend/menu', [BackendMenuController::class, 'index'])->name('admin.backendmenu.index');
        Route::get('backend/menu/create', [BackendMenuController::class, 'create'])->name('admin.backendmenu.create');
        Route::post('backend/menu/store', [BackendMenuController::class, 'store'])->name('admin.backendmenu.store');
        Route::get('backend/menu/edit/{id}', [BackendMenuController::class, 'edit'])->name('admin.backendmenu.edit');
        Route::post('backend/menu/update', [BackendMenuController::class, 'update'])->name('admin.backendmenu.update');
        Route::get('backend/menu/delete/{id}', [BackendMenuController::class, 'delete'])->name('admin.backendmenu.delete');

        //backend Submenu
        //create backend menu
        Route::get('backend/submenu/{id}', [BackendSubMenuController::class, 'index'])->name('admin.backend.submenu.index');
        Route::get('backend/submenu/create/{id}', [BackendSubMenuController::class, 'create'])->name('admin.backend.submenu.create');
        Route::post('backend/submenu/store', [BackendSubMenuController::class, 'store'])->name('admin.backend.submenu.store');
        Route::get('backend/submenu/edit/{id}', [BackendSubMenuController::class, 'edit'])->name('admin.backend.submenu.edit');
        Route::post('backend/submenu/update', [BackendSubMenuController::class, 'update'])->name('admin.backend.submenu.update');
        Route::get('backend/submenu/delete/{id}', [BackendSubMenuController::class, 'delete'])->name('admin.backend.submenu.delete');

        //ROles
        Route::get('roles', [RolesController::class, 'index'])->name('admin.roles');
        Route::get('roles/create', [RolesController::class, 'create'])->name('admin.roles.create');
        Route::post('roles/store', [RolesController::class, 'store'])->name('admin.roles.store');
        Route::get('roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
        Route::post('roles/update', [RolesController::class, 'update'])->name('admin.roles.update');
        Route::get('roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');

        Route::get('/users', [AdminController::class, 'viewusers'])->name('admin.users');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/user/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/user/edit/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
        Route::post('/user/update', [AdminController::class, 'update'])->name('admin.user.update');
        Route::post('/user/status', [AdminController::class, 'UpdateAdminStatus'])->name('admin.user.status');
        Route::get('/user/delete/{id}', [AdminController::class, 'delete'])->name('admin.user.delete');
        Route::post('/user/updatepassword', [AdminController::class, 'SetPassword'])->name('admin.user.setpassword');

        Route::get('/students', [StudentUsersController::class, 'index'])->name('admin.student.index');
        Route::get('/student/create', [StudentUsersController::class, 'create'])->name('admin.student.create');
        Route::post('/student/store', [StudentUsersController::class, 'store'])->name('admin.student.store');
        Route::get('/student/edit/{id}', [StudentUsersController::class, 'edit'])->name('admin.student.edit');
        Route::post('/student/update', [StudentUsersController::class, 'update'])->name('admin.student.update');
        Route::post('/student/update/password', [StudentUsersController::class, 'UpdatePassword'])->name('admin.student.update.password');
        Route::get('/student/delete/{id}', [StudentUsersController::class, 'delete'])->name('admin.student.delete');


        //exam Master
        Route::get('exam/master')->name('admin.exam.master');

        //Batches
        Route::get('/batches', [BatchesController::class, 'index'])->name('admin.batches');
        Route::get('/batches/create', [BatchesController::class, 'create'])->name('admin.batches.create');
        Route::post('/batches/store', [BatchesController::class, 'store'])->name('admin.batches.store');
        Route::get('/batches/edit/{id}', [BatchesController::class, 'edit'])->name('admin.batches.edit');
        Route::post('/batches/update', [BatchesController::class, 'update'])->name('admin.batches.update');
        Route::get('/batches/delete/{id}', [BatchesController::class, 'delete'])->name('admin.batches.delete');

        //Subjects
        Route::get('/subjects/{id?}', [SubjectsController::class, 'index'])->name('admin.subjects');
        Route::get('/subjects/create/{id}', [SubjectsController::class, 'create'])->name('admin.subjects.create');
        Route::post('/subjects/store', [SubjectsController::class, 'store'])->name('admin.subjects.store');
        Route::get('/subjects/edit/{id}', [SubjectsController::class, 'edit'])->name('admin.subjects.edit');
        Route::post('/subjects/update', [SubjectsController::class, 'update'])->name('admin.subjects.update');
        Route::get('/subjects/delete/{id}', [SubjectsController::class, 'delete'])->name('admin.subjects.delete');


        //////CHAPTER MASTER
        Route::get('chapter/master/{id?}', [ChaptersController::class, 'index'])->name('admin.chapter.master');
        Route::get('chapters/create/{id?}', [ChaptersController::class, 'create'])->name('admin.chapter.create');
        Route::post('chapter/store', [ChaptersController::class, 'store'])->name('admin.chapter.store');
        Route::get('chapter/edit/{id}/{subject_id?}', [ChaptersController::class, 'edit'])->name('admin.chapter.edit');
        Route::post('chapter/update', [ChaptersController::class, 'update'])->name('admin.chapter.update');
        Route::get('chapter/delete/{id}', [ChaptersController::class, 'delete'])->name('admin.chapter.delete');

        //topics master
        Route::get('topics/master/{id?}', [TopicsController::class, 'index'])->name('admin.topics');
        Route::get('topics/master/create/{id?}', [TopicsController::class, 'create'])->name('admin.topics.create');
        Route::post('topics/master/store', [TopicsController::class, 'store'])->name('admin.topics.store');
        Route::get('topics/master/edit/{id}', [TopicsController::class, 'edit'])->name('admin.topics.edit');
        Route::post('topics/master/update', [TopicsController::class, 'update'])->name('admin.topics.update');
        Route::get('topics/master/delete/{id}', [TopicsController::class, 'delete'])->name('admin.topics.delete');

        ///QUESTION MASTER
        Route::get('question/master1/{id}', [QuestionsController::class, 'index'])->name('admin.question.master');
        Route::get('question/master/{id}', [QuestionsController::class, 'index'])->name('admin.question.master');
        //question edit route
        Route::get('question/edit/{id}', [QuestionsController::class, 'edit'])->name('admin.question.edit');
        Route::get('question/delete/{id}', [QuestionsController::class, 'delete'])->name('admin.question.delete');
        Route::get('question/showdetails/{id}', [QuestionsController::class, 'viewQuestionDetails'])->name('admin.question.details');
        //
        //---Descriptive----//
        Route::get('question/create/descrptive/{id}', [QuestionsController::class, 'CreateDescriptive'])->name('admin.question.create.descriptive');
        Route::post('question/create/descrptive/store', [QuestionsController::class, 'StoreDescriptive'])->name('admin.question.store.descriptive');
        Route::get('question/edit/descrptive/{id}', [QuestionsController::class, 'EditDescriptive'])->name('admin.question.edit.descriptive');
        Route::post('question/create/descrptive/update', [QuestionsController::class, 'UpdateDescriptive'])->name('admin.question.update.descriptive');

        ///---- fill in the blanks
        Route::get('question/create/fb/{id}', [QuestionsController::class, 'CreateFB'])->name('admin.question.create.fb');
        Route::post('question/fb/store', [QuestionsController::class, 'StoreFB'])->name('admin.question.store.fb');
        Route::post('question/create/fb/update', [QuestionsController::class, 'UpdateFB'])->name('admin.question.update.fb');

        ///---- True and False
        Route::get('question/create/tf/{id}', [QuestionsController::class, 'CreateTF'])->name('admin.question.create.tf');
        Route::post('question/tf/store', [QuestionsController::class, 'StoreTF'])->name('admin.question.store.tf');
        Route::post('question/create/tf/update', [QuestionsController::class, 'UpdateTF'])->name('admin.question.update.tf');

         ///---- Diagramss
         Route::get('question/create/mcq/{id}', [QuestionsController::class, 'CreateMCQ'])->name('admin.question.create.mcq');
         Route::post('question/mcq/store', [QuestionsController::class, 'StoreMCQ'])->name('admin.question.store.mcq');
         Route::post('question/mcq/update', [QuestionsController::class, 'UpdateMCQ'])->name('admin.question.update.mcq');


        ///---- Diagramss
        Route::get('question/create/diagram/{id}', [QuestionsController::class, 'CreateDiagram'])->name('admin.question.create.diagram');
        Route::post('question/diagram/store', [QuestionsController::class, 'StoreDiagram'])->name('admin.question.store.diagram');
        Route::post('question/diagram/update', [QuestionsController::class, 'UpdateDiagram'])->name('admin.question.update.diagram');

        ////----quick question
        Route::get('question/create/quickquestion/{id}', [QuestionsController::class, 'QuickQuestion'])->name('admin.question.quick.question');
        Route::post('question/store/quickquestion', [QuestionsController::class, 'QuickQuestionStore'])->name('admin.question.quick.store');

        //Quick question paper
        Route::get('quick/questionpaper', [QuestionPapersController::class, 'QuickPapersIndex'])->name('admin.quick.questionpapers');
        Route::post('quick/questionpaper/generate', [QuestionPapersController::class, 'GenerateQuickQuestionPaper'])->name('admin.quick.questionpapers.generate');


       // Question Paper Formate
       Route::get('questionpaper/format', [QuestionPaperFormateController::class, 'QuickPapersIndex'])->name('admin.qp.format');
       Route::get('questionpaper/format/create', [QuestionPaperFormateController::class, 'create'])->name('admin.qp.format.create');
       Route::post('questionpaper/format/store', [QuestionPaperFormateController::class, 'store'])->name('admin.qp.format.store');
       Route::get('questionpaper/format/edit/{id}', [QuestionPaperFormateController::class, 'edit'])->name('admin.qp.format.edit');
       Route::post('questionpaper/format/update', [QuestionPaperFormateController::class, 'update'])->name('admin.qp.format.update');
       Route::get('questionpaper/format/delete/{id}', [QuestionPaperFormateController::class, 'delete'])->name('admin.qp.format.delete');


       ///////////Products//////
       Route::get('products/{id?}', [PackagesController::class, 'index'])->name('admin.packages.master');
       Route::get('products/create/{id}', [PackagesController::class, 'create'])->name('admin.packages.create');
       Route::post('products/store', [PackagesController::class, 'store'])->name('admin.packages.store');
       Route::get('products/edit/{id}', [PackagesController::class, 'edit'])->name('admin.packages.edit');
       Route::post('products/update', [PackagesController::class, 'update'])->name('admin.packages.update');
       Route::get('products/delete/{id}', [PackagesController::class, 'delete'])->name('admin.packages.delete');

        //Question papes for package
        Route::get('products/addpapers/{package_id?}', [PackagesController::class, 'addpapers'])->name('admin.packages.addpapers');
        Route::get('products/addpapers/addfile/{package_id}', [PackagesController::class, 'addFile'])->name('admin.packages.addpaper.file');
        Route::post('products/addpapers/storeFile', [PackagesController::class, 'paperStoreFile'])->name('admin.packages.store.paper.file');
        Route::get('products/addpapers/editFile/{package_id}', [PackagesController::class, 'paperEditFile'])->name('admin.packages.edit.paper.file');
        Route::post('products/addpapers/update', [PackagesController::class, 'paperUpdateFile'])->name('admin.packages.update.paper.file');
        Route::get('products/addpapers/deleteFile/{package_id}', [PackagesController::class, 'paperDeleteFile'])->name('admin.packages.delete.paper.file');
        Route::post('products/addpapers/sortorder', [PackagesController::class, 'paperSortID'])->name('admin.packages.addpaper.sortid');


        //backend reach-us request
        Route::get('contact-us/requests',[BackendContactUsController::class,'index'])->name('backend.contact-us.requests');
        Route::get('contact-us/request/edit/{id}',[BackendContactUsController::class,'edit'])->name('backend.contact-us.request.edit');
        Route::post('contact-us/request/update',[BackendContactUsController::class,'update'])->name('backend.contact-us.request.update');
        Route::get('contact-us/request/delete/{id}',[BackendContactUsController::class,'delete'])->name('backend.contact-us.request.delete');

        //Missing Payments
        Route::get('missing/payments', [PaymentsController::class, 'missing_payments'])->name('admin.missing.payments.index');
        Route::post('missing/payments/convert/{id}', [PaymentsController::class, 'convertToSuccess'])->name('admin.missing.payments.convert.to.success');

        //payment history
        Route::get('payments/history', [PaymentsController::class, 'payment_history'])->name('admin.payments.history');
        Route::get('payment/view/{id}', [PaymentsController::class, 'viewPaymentDetails'])->name('admin.payments.details.view');

        //all uploaded sheets
        Route::get('student/sheets', [StudentSheetsController::class, 'uploaded_sheets'])->name('admin.view.student.sheets');
        Route::get('student/sheet/viewdetails/{id}', [StudentSheetsController::class, 'ViewDetails'])->name('admin.view.student.sheet.details');
        Route::get('student/sheet/upload/checkedsheet/{id}', [StudentSheetsController::class, 'uploadCheckedSheet'])->name('admin.upload.checked.sheet');
        Route::post('student/sheet/store/checkedsheet', [StudentSheetsController::class, 'storeCheckedSheet'])->name('admin.store.checked.sheet');
        Route::post('student/sheet/reject/{id}', [StudentSheetsController::class, 'sheetReject'])->name('admin.store.reject.sheet');
        Route::get('show/nextsheet/{sheet_id}', [StudentSheetsController::class, 'nextSheet'])->name('admin.show.nextsheet');



        Route::get('my/checkings', [StudentSheetsController::class, 'myCheckings'])->name('admin.checker.my.checkings');
        Route::get('my/pending/sheets', [StudentSheetsController::class, 'myPendingSheets'])->name('admin.checker.pendingsheets');
        Route::get('my/checked/sheets', [StudentSheetsController::class, 'myCheckedSheets'])->name('admin.checker.checkedsheets');
        Route::get('my/rejected/sheets', [StudentSheetsController::class, 'myRejectedSheets'])->name('admin.checker.rejectedsheet');
        Route::get('my/new/uploads', [StudentSheetsController::class, 'newUploads'])->name('admin.pending.sheets');

        //Free MCQ
        Route::get('free/exams', [FreeExamsController::class, 'index'])->name('admin.free.exams');
        Route::get('free/exams/create', [FreeExamsController::class, 'create'])->name('admin.free.exam.create');
        Route::post('free/exams/store', [FreeExamsController::class, 'store'])->name('admin.free.exam.store');
        Route::get('free/exams/edit/{id}', [FreeExamsController::class, 'edit'])->name('admin.free.exam.edit');
        Route::post('free/exams/update', [FreeExamsController::class, 'update'])->name('admin.free.exam.update');
        Route::get('free/exams/delete/{id}', [FreeExamsController::class, 'delete'])->name('admin.free.exams.delete');
        Route::get('free/exams/managequestions/{id}', [FreeExamsController::class, 'managequestions'])->name('admin.free.exams.managequestions');
        Route::get('free/exams/addquestions/{id}', [FreeExamsController::class, 'addquestions'])->name('admin.free.exams.addquestions');
        Route::get('free/exams/fetchquestions', [FreeExamsController::class, 'fetchquestions'])->name('admin.free.exams.fetchquestion');
        Route::post('free/exams/storequestions', [FreeExamsController::class, 'storeQuestions'])->name('admin.free.exams.storequestions');
        Route::get('free/exams/delete/question/{id}', [FreeExamsController::class, 'deleteQuestions'])->name('admin.free.exams.deletequestion');

        //Reports
        Route::get('report/batches/purchased', [ReportsController::class, 'batchPurchasedReport'])->name('admin.reports.purchases');
        Route::get('report/students/sheets', [ReportsController::class, 'studentSheetsReport'])->name('admin.reports.student.sheets');



    });
    Route::get('/assign', [AdminController::class, 'assign']);
});
