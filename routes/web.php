<?php



use App\Http\Controllers\BackEnd\C_jobcontroller;
use App\Http\Controllers\BackEnd\CreateIspectionController;
use App\Http\Controllers\BackEnd\h_HazardController;
use App\Http\Controllers\BackEnd\HirarcController;
use App\Http\Controllers\BackEnd\I_SchaduleController;
use App\Http\Controllers\BackEnd\ListInspectionController;
use App\Http\Controllers\BackEnd\ptw_AssinationController;
use App\Http\Controllers\BackEnd\ptw_ConstractorController;
use App\Http\Controllers\BackEnd\ptw_detailsController;
use App\Http\Controllers\BackEnd\ptw_IsolationController;
use App\Http\Controllers\BackEnd\ptw_offerController;
use App\Http\Controllers\BackEnd\ptw_workController;
use App\Http\Controllers\BackEnd\ErpControllerController;
use App\Http\Controllers\BackEnd\RectifiedInspectionController;

use App\Http\Controllers\BackEnd\AccidentInvestigationController;
use App\Http\Controllers\BackEnd\AnalysisController;
use App\Http\Controllers\BackEnd\generateCommittee;
use App\Http\Controllers\BackEnd\MailController;
use App\Http\Controllers\BackEnd\meeting\meetingController;
use App\Http\Controllers\BackEnd\SafetyPolicyController;
use App\Http\Controllers\BackEnd\SchaduleController;
use App\Http\Controllers\BackEnd\UploadPolicyController;
use App\Http\Controllers\BackEnd\WorkInspectionController;
use App\Http\Controllers\CompanySetup\DepartmentController;
use App\Http\Controllers\CompanySetup\DesignationController;
use App\Http\Controllers\CompanySetup\EmployeeController;
use App\Http\Controllers\SafetyCommittee\SafetyCommitteeController;
use App\Http\Controllers\SWP\SafeWorkProcedureController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BackEnd\CompanyProfileController;


//use App\Http\Controllers\BackEnd\CompanyProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/sdsSearch', [FrontendController::class, 'sdsSearch'])->name('sdsSearch');
Route::get('/sds-search-result', [FrontendController::class, 'getSearchResult'])->name('sds-search-result');
Route::get('/user-create', [UserController::class, 'index'])->name('user.index');
Route::get('/login', [UserController::class, 'logout'])->name('login');
Route::get('/register-user', [RegisterController::class, 'index'])->name('register-user');

Route::post('/mail-sending/{id}',[MailController::class,'sendMail'])->name('send.email');

Route::post('/authorization/login', 'Auth\LoginController@authorization')->name('authorization.login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', 'UserController');
Route::resource('permission', 'PermissionController');
Route::resource('role', 'RoleController');
Route::post('/permission-update', [PermissionController::class, 'permissionUpdate'])->name('permissionUpdate');
Route::post('/permission-details/{id}', [PermissionController::class, 'permissionDetails'])->name('permissionDetails');
Route::post('/role-details/{id}', [RoleController::class, 'roleDetails'])->name('roleDetails');
Route::post('/permission-datatable', [PermissionController::class, 'datatable'])->name('permissionDatatable');
Route::post('/role-datatable', [RoleController::class, 'datatable'])->name('roleDatatable');
Route::get('/user-profile', 'UserController@profile')->name('user.profile');
Route::post('/user-profile-update/{id}', 'UserController@profileUpdate')->name('user.profileUpdate');
Route::post('/user-updateProfile', 'UserController@updateProfile')->name('user.updateProfile');


/////////////////// axios request

Route::get('/getAllPermission', [PermissionController::class, 'getAllPermissions']);
Route::post('/postRole', [RoleController::class, 'store']);
Route::put('/postUpdateRole/{id}', [RoleController::class, 'update']);
Route::delete('/deleteRole/{id}', [RoleController::class, 'destroy'])->name('role.delete');
Route::get('/getAllUsers', [UserController::class, 'getAll'])->name('getAllUsers');
Route::get('/getAllRoles', [RoleController::class, 'getAllRoles'])->name('getAllRoles');

////////////// User Create
Route::post('/account/create', [UserController::class, 'store'])->name('account.create');
Route::delete('/delete/user/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::put('/account/update/{id}', [UserController::class, 'update'])->name('user.update');


Route::get('/company-profile', [CompanyProfileController::class, 'getAllCompany'])->name('company.profile');


Route::group(['name' => 'department', 'as' => 'department.'], function () {
    Route::get('department', [DepartmentController::class, 'index'])->name('index');
    Route::POST('department-store', [DepartmentController::class, 'store'])->name('store');
    Route::get('department-edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
    Route::put('department-update/{id}', [DepartmentController::class, 'update'])->name('update');
    Route::get('department-datatable-list', [DepartmentController::class, 'datatable'])->name('datatable');
    Route::get('department-destroy/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
});
Route::group(['name' => 'designation', 'as' => 'designation.'], function () {
    Route::get('designation', [DesignationController::class, 'index'])->name('index');
    Route::post('designation.store', [DesignationController::class, 'store'])->name('designationstore');
    Route::get('designation-datatable-list', [DesignationController::class, 'datatable'])->name('datatable');
    Route::get('designation.edit/{id}', [DesignationController::class, 'designationedit'])->name('designation-edit');
    Route::put('designation/{id}', [DesignationController::class, 'editstore'])->name('editstore');
    Route::get('designation-destroy/{id}', [DesignationController::class, 'destroy'])->name('destroy');
});
Route::group(['name' => 'employee', 'as' => 'employee.'], function () {
    Route::get('employee', [EmployeeController::class, 'index'])->name('index');
    Route::get('employee-data-list', [EmployeeController::class, 'datatable'])->name('data-list');
    Route::Post('employee/store', [EmployeeController::class, 'store'])->name('store');
    Route::get('emp-information-ajax-data', [EmployeeController::class, 'getempinfo'])->name('getempinfo');
    Route::post('emp-information-update-data', [EmployeeController::class, 'empUpdate'])->name('empUpdate');
});

Route::group(['middleware' => ['auth'], 'name' => 'safety', 'as' => 'safety.'], function () {
    Route::get('safety/policy', [SafetyPolicyController::class, 'index'])->name('index');
    Route::get('policy/generate', [SafetyPolicyController::class, 'policyindex'])->name('policy-index');
    Route::post('policy/data-get', [SafetyPolicyController::class, 'dataGet'])->name('data-get');
    Route::post('generate/safety', [SafetyPolicyController::class, 'store'])->name('store');
    Route::get('safety/view', [SafetyPolicyController::class, 'show'])->name('safety-view');
    Route::get('safety/download/{id}', [SafetyPolicyController::class, 'download'])->name('download');
    Route::get('safety/modify/{id}', [SafetyPolicyController::class, 'modify'])->name('modify');
    Route::PUT('safety/modify-store/{id}', [SafetyPolicyController::class, 'modifystore'])->name('update');
    Route::get('safety/delete/{id}', [SafetyPolicyController::class, 'destroy'])->name('destroy');
    Route::get('policy/getdesignation/{id}', [SafetyPolicyController::class, 'getempdesignation'])->name('employeedesignation');
    Route::get('policy-view',[SafetyPolicyController::class,'safetyview'])->name('policy-view');
    Route::get('template',[SafetyPolicyController::class,'safetytemplate'])->name('template');
    Route::get('policy-destroy/{id}', [SafetyPolicyController::class, 'updestroy'])->name('updelete');
});

Route::group(['middleware' => ['auth'], 'name' => 'upload_policy', 'as' => 'upload_policy.'], function () {
    Route::get('upload-policy', [UploadPolicyController::class, 'index'])->name('index');
    Route::POST('policy-store', [UploadPolicyController::class, 'store'])->name('store');
    Route::get('policy-edit/{id}', [UploadPolicyController::class, 'edit'])->name('edit');
    Route::put('policy-update/{id}', [UploadPolicyController::class, 'update'])->name('update');
    Route::get('policy-datatable-list', [UploadPolicyController::class, 'datatable'])->name('datatable');

});

Route::group(['name' => 'com_profile', 'as' => 'com_profile.'], function () {
    Route::get('com_profile', [CompanyProfileController::class, 'index'])->name('index');
    Route::post('com_profile/store', [CompanyProfileController::class, 'store'])->name('store');
});


Route::group(['name' => 'safe_work_procedure', 'as' => 'safe_work_procedure.'], function () {
    Route::get('safe-work-procedure', [SafeWorkProcedureController::class, 'index'])->name('index');
    Route::post('safe-work-procedure-store', [SafeWorkProcedureController::class, 'store'])->name('store');
    Route::get('safe-work-procedure-edit/{id}', [SafeWorkProcedureController::class, 'edit'])->name('edit');
    Route::put('safe-work-procedure-update/{id}', [SafeWorkProcedureController::class, 'update'])->name('update');
    Route::get('safe-work-procedure-view/{id}', [SafeWorkProcedureController::class, 'swpView'])->name('details');
    Route::get('safe_work_procedure-destroy/{id}', [SafeWorkProcedureController::class, 'destroy'])->name('destroy');
});


Route::group(['middleware' => ['auth'], 'name' => 'workinspection', 'as' => 'workinspection.'], function () {
    Route::get('workpalce_inspection', [WorkInspectionController::class, 'index'])->name('index');
    Route::POST('workpalce_inspection-store', [WorkInspectionController::class, 'store'])->name('store');
    Route::get('workpalce_inspection-edit/{id}', [WorkInspectionController::class, 'edit'])->name('edit');
    Route::put('workpalce_inspection-update/{id}', [WorkInspectionController::class, 'update'])->name('update');
    Route::get('workpalce_inspection-datatable-list', [WorkInspectionController::class, 'datatable'])->name('datatable');
    Route::get('workpalce_inspection-destroy/{id}', [WorkInspectionController::class, 'destroy'])->name('destroy');
});

Route::group(['middleware' => ['auth'], 'name' => 'create_ispection', 'as' => 'create_ispection.'], function () {
    Route::get('create_ispection', [CreateIspectionController::class, 'index'])->name('index');
    Route::POST('create_ispection-store', [CreateIspectionController::class, 'store'])->name('store');
    Route::get('create_ispection-edit/{id}', [CreateIspectionController::class, 'edit'])->name('edit');
    Route::put('create_ispection-update/{id}', [CreateIspectionController::class, 'update'])->name('update');
    Route::get('create_ispection-datatable-list', [CreateIspectionController::class, 'datatable'])->name('datatable');
    Route::get('create_ispection-destroy/{id}', [CreateIspectionController::class, 'destroy'])->name('destroy');
});
Route::group(['middleware' => ['auth'], 'name' => 'list_inspection', 'as' => 'list_inspection.'], function () {

    Route::get('list-inspection', [ListInspectionController::class, 'index'])->name('index');
    Route::POST('list-inspection-store', [ListInspectionController::class, 'store'])->name('store');
    Route::get('list-inspection-edit/{id}', [ListInspectionController::class, 'edit'])->name('edit');
    Route::put('list-inspection-update/{id}', [ListInspectionController::class, 'update'])->name('update');
    Route::get('list-inspection-datatable-list', [ListInspectionController::class, 'datatable'])->name('datatable');
    Route::get('list-inspection-destroy/{id}', [ListInspectionController::class, 'destroy'])->name('destroy');
});

Route::group(['middleware' => ['auth'], 'name' => 'rectified_inspection', 'as' => 'rectified_inspection.'], function () {
    Route::get('rectified-inspection', [RectifiedInspectionController::class, 'index'])->name('index');
    Route::POST('rectified-inspection-store', [RectifiedInspectionController::class, 'store'])->name('store');
    Route::get('rectified-inspection-edit/{id}', [RectifiedInspectionController::class, 'edit'])->name('edit');
    Route::put('rectified-inspection-update/{id}', [RectifiedInspectionController::class, 'update'])->name('update');
    Route::get('rectified-inspection-datatable-list', [RectifiedInspectionController::class, 'datatable'])->name('datatable');
    Route::get('rectified-inspection-destroy/{id}', [RectifiedInspectionController::class, 'destroy'])->name('destroy');
});
Route::group(['middleware' => ['auth'], 'name' => 'hirarc', 'as' => 'hirarc.'], function () {
    Route::get('hirarc', [HirarcController::class, 'index'])->name('index');
    Route::POST('hirarc-store', [HirarcController::class, 'store'])->name('store');
    Route::get('hirarc-edit/{id}', [HirarcController::class, 'edit'])->name('edit');
    Route::put('hirarc-update/{id}', [HirarcController::class, 'update'])->name('update');
    Route::get('hirarc-data-list-view', [HirarcController::class, 'listview'])->name('listview');
    Route::get('hirarc-data-list', [HirarcController::class, 'datatable'])->name('datatable');
    Route::get('hirarc-destroy/{id}', [HirarcController::class, 'destroy'])->name('destroy');
    Route::get('hirarc-data-view/{id}', [HirarcController::class, 'view'])->name('view');
    Route::get('getempdesignation/{id}', [HirarcController::class, 'getempdesignation'])->name('getempdesignation');
    Route::get('hirarc-edit/getempdesignation/{id}', [HirarcController::class, 'getempdesignation'])->name('getempdesignation');
});


Route::group(['middleware' => ['auth'], 'name' => 'c_job', 'as' => 'c_job.'], function () {
    Route::get('create-job', [C_jobcontroller::class, 'index'])->name('index');
    Route::POST('job-store', [C_jobcontroller::class, 'store'])->name('store');
    Route::get('job-edit/{id}', [C_jobcontroller::class, 'edit'])->name('edit');
    Route::put('job-update/{id}', [C_jobcontroller::class, 'update'])->name('update');
    Route::get('job-data-list-view', [C_jobcontroller::class, 'listview'])->name('listview');
    Route::get('data-list-view', [C_jobcontroller::class, 'datalist'])->name('data_list');
    Route::get('job-data-list', [C_jobcontroller::class, 'datatable'])->name('datatable');
    Route::get('job-destroy/{id}', [C_jobcontroller::class, 'destroy'])->name('destroy');
    Route::get('job-data-view/{id}', [C_jobcontroller::class, 'view'])->name('view');
    Route::get('droponchange/{id}', [C_jobcontroller::class, 'droponchange'])->name('droponchange');

});
Route::group(['middleware' => ['auth'], 'name' => 'h_hazard', 'as' => 'h_hazard.'], function ()
{
    Route::get('h_hazard/', [h_HazardController::class, 'index'])->name('index');
    Route::POST('hazard-store', [h_HazardController::class, 'store'])->name('store');
    Route::get('hazard-edit/{id}', [h_HazardController::class, 'edit'])->name('edit');
    Route::put('hazard-update/{id}', [h_HazardController::class, 'update'])->name('update');
    Route::get('hazard-data-list-view', [h_HazardController::class, 'listview'])->name('listview');
    Route::get('hazard-data-list', [h_HazardController::class, 'datatable'])->name('datatable');
    Route::get('hazard-destroy/{id}', [h_HazardController::class, 'destroy'])->name('destroy');
    Route::get('hazard-data-view/{id}', [h_HazardController::class, 'view'])->name('view');
    Route::get('depertmentonchange/{id}', [h_HazardController::class, 'depertmentonchange'])->name('depertmentonchange');
});



Route::group(['middleware' => ['auth'], 'name' => 'safety_committee', 'as' => 'safety_committee.'], function () {

    Route::get('safety_committee', [SafetyCommitteeController::class, 'index'])->name('index');
    Route::get('safety_committee/getData/', [SafetyCommitteeController::class, 'getData'])->name('getData');
    Route::get('safety_committee/chart/', [SafetyCommitteeController::class, 'chart'])->name('chart');
    Route::POST('safety_committee/store', [SafetyCommitteeController::class, 'store'])->name('store');
    Route::post('safety_committee/edit/{id}', [SafetyCommitteeController::class, 'edit'])->name('edit');
    Route::post('safety_committee/update/{id}', [SafetyCommitteeController::class, 'update'])->name('update');


});

Route::group(['middleware' => ['auth'], 'name' => 'committee', 'as' => 'committee.'], function () {
    Route::get('committee', [generateCommittee ::class, 'index'])->name('index');
    // Route::post('store',[generateCommittee::class,'store'])->name('store');
    Route::post('employee-list', [generateCommittee ::class, 'employee'])->name('employee');
    Route::post('committee.insert', [generateCommittee::class, 'generatepdf'])->name('store');
    Route::get('delete/{id}', [generateCommittee ::class, 'destroy'])->name('destroy');
});

Route::group(['middleware' => ['auth'], 'name' => 'meeting', 'as' => 'meeting.'], function () {
    Route::get('view-meeting', [meetingController::class, 'index'])->name('index');
    Route::post('meeting-store', [meetingController::class, 'store'])->name('store');
    Route::get('meeting-datatable', [meetingController::class, ' datatable'])->name('datatable');
    Route::post('view-meeting-data', [meetingController::class, 'getData'])->name('getData');
    Route::get('report.delete/{id}', [meetingController::class, 'destroy'])->name('delete');
    Route::get('report.view/{id}', [meetingController::class, 'show'])->name('report');
    Route::get('report.pdf/{id}', [meetingController::class, 'reportpdf'])->name('report-pdf');
    Route::get('meeting-edit/{id}', [meetingController::class, 'edit'])->name('meeting-edit');
    Route::put('meeting-update/{id}', [meetingController::class, 'update'])->name('meeting-update');
});

Route::group(['middleware' => ['auth'], 'name' => 'accident_investigation', 'as' => 'accident_investigation.'], function () {

    Route::get('accident-investigation', [AnalysisController::class, 'accident'])->name('index');

//    //JSN request
    Route::get('get-em-name/{id}', [AnalysisController::class, 'getempName'])->name('getempName');
    Route::get('get-emp_designation/{id}', [AnalysisController::class, 'getdesignation'])->name('getdesignation');
//    // JSN END
    Route::POST('Accident-investigation-store', [AnalysisController::class, 'store'])->name('store');
    Route::get('list-accident', [AnalysisController::class, 'list_acci'])->name('acci_list');
});

Route::group(['middleware' => ['auth'], 'name' => 'accident_report', 'as' => 'accident_report.'], function () {
    Route::get('accident-report', [AccidentInvestigationController::class, 'index'])->name('index');
    Route::get('why-wizerd/{id}', [AccidentInvestigationController::class, 'whyWizerd'])->name('why_wizerd');
    Route::get('why-incident-happen/{id}', [AccidentInvestigationController::class, 'whyIncidentHappen'])->name('why_incident_happen');
    Route::get('identify-injured-part/{id}', [AccidentInvestigationController::class, 'identifyInjuredPart'])->name('identify_injured_part');
    Route::post('why-incident-happen-store', [AccidentInvestigationController::class, 'whyIncidentHappenStore'])->name('why_incident_happen_store');
    Route::post('identify-injured-part-store', [AccidentInvestigationController::class, 'identifyInjuredPartStore'])->name('identify_injured_part_store');
    Route::post('why-wizerd-store', [AccidentInvestigationController::class, 'store'])->name('store');
    Route::post('report', [AccidentInvestigationController::class, 'report'])->name('reportstore');
});


//Route::group(['middleware' => ['auth'], 'name' => 'h_hazard', 'as' => 'h_hazard.'], function ()
//{
//    Route::get('h_hazard/', [h_HazardController::class, 'index'])->name('index');
//    Route::POST('hazard-store', [h_HazardController::class, 'store'])->name('store');
//    Route::get('hazard-edit/{id}', [h_HazardController::class, 'edit'])->name('edit');
//    Route::put('hazard-update/{id}', [h_HazardController::class, 'update'])->name('update');
//    Route::get('hazard-data-list-view', [h_HazardController::class, 'listview'])->name('listview');
//    Route::get('hazard-data-list', [h_HazardController::class, 'datatable'])->name('datatable');
//    Route::get('hazard-destroy/{id}', [h_HazardController::class, 'destroy'])->name('destroy');
//    Route::get('hazard-data-view/{id}', [h_HazardController::class, 'view'])->name('view');
//    Route::get('depertmentonchange/{id}', [h_HazardController::class, 'depertmentonchange'])->name('depertmentonchange');
//});

Route::group(['middleware' => ['auth'], 'name' => 'i_schadule', 'as' => 'i_schadule.'], function () {
    Route::get('i_schadule', [I_SchaduleController::class, 'index'])->name('index');
    Route::post('i_schadule-store', [I_SchaduleController::class, 'store'])->name('store');
    Route::get('i_schadule-edit/{id}', [I_SchaduleController::class, 'edit'])->name('edit');
    Route::post('i_schadule-update/{id}', [I_SchaduleController::class, 'update'])->name('update');
    Route::get('i_schadule-data-list-view', [I_SchaduleController::class, 'listview'])->name('listview');
    Route::get('i_schadule-data-list', [I_SchaduleController::class, 'datatable'])->name('datatable');
    Route::get('i_schadule-destroy/{id}', [I_SchaduleController::class, 'destroy'])->name('destroy');
    Route::get('i_schadule-data-view/{id}', [I_SchaduleController::class, 'view'])->name('view');
});

Route::group(['middleware' => ['auth'], 'name' => 'schadule', 'as' => 'schadule.'], function () {
    Route::get('schadule', [SchaduleController::class, 'index'])->name('index');
    Route::post('schadule-store', [SchaduleController::class, 'store'])->name('store');
    Route::get('schadule-edit/{id}', [SchaduleController::class, 'edit'])->name('edit');
    Route::put('schadule-update/{id}', [SchaduleController::class, 'update'])->name('update');
    Route::get('schadule-data-list-view', [SchaduleController::class, 'listview'])->name('listview');
    Route::get('schadule-data-list', [SchaduleController::class, 'datatable'])->name('datatable');
    Route::get('schadule-destroy/{id}', [SchaduleController::class, 'destroy'])->name('destroy');
    Route::get('schadule-data-view/{id}', [SchaduleController::class, 'view'])->name('view');
});

Route::group(['middleware' => ['auth'],'name' => 'i_schadule', 'as' => 'i_schadule.'], function () {
    Route::get('i_schadule', [I_SchaduleController::class, 'index'])->name('index');
    Route::POST('i_schadule-store', [I_SchaduleController::class, 'store'])->name('store');
    Route::get('i_schadule-edit/{id}', [I_SchaduleController::class, 'edit'])->name('edit');
    Route::post('i_schadule-update/{id}', [I_SchaduleController::class, 'update'])->name('update');
    Route::get('i_schadule-data-list-view', [I_SchaduleController::class, 'listview'])->name('listview');
    Route::get('i_schadule-data-list', [I_SchaduleController::class, 'datatable'])->name('datatable');
    Route::get('i_schadule-destroy/{id}', [I_SchaduleController::class, 'destroy'])->name('destroy');
    Route::get('i_schadule-data-view/{id}', [I_SchaduleController::class, 'view'])->name('view');


});

Route::group(['name' => 'schadule', 'as' => 'schadule.'], function () 
{
    Route::get('schadule', [SchaduleController::class, 'index'])->name('index');
    Route::POST('schadule-store', [SchaduleController::class, 'store'])->name('store');
    Route::get('schadule-edit/{id}', [SchaduleController::class, 'edit'])->name('edit');
    Route::put('schadule-update/{id}', [SchaduleController::class, 'update'])->name('update');
    Route::get('schadule-data-list-view', [SchaduleController::class, 'listview'])->name('listview');
    Route::get('schadule-data-list', [SchaduleController::class, 'datatable'])->name('datatable');
    Route::get('schadule-destroy/{id}', [SchaduleController::class, 'destroy'])->name('destroy');
    Route::get('schadule-data-view/{id}', [SchaduleController::class, 'view'])->name('view');


});


Route::group(['middleware' => ['auth'],'name' => 'ptw_work', 'as' => 'ptw_work.'], function () {
    Route::get('ptw-work', [ptw_workController::class, 'index'])->name('index');
    Route::POST('ptw-work-store', [ptw_workController::class, 'store'])->name('store');

    Route::get('ptw-work-edit/{id}', [ptw_workController::class, 'edit'])->name('edit');

    Route::PUT('ptw-work-update/{id}', [ptw_workController::class, 'update'])->name('update');
    Route::get('ptw-work-data-list-view', [ptw_workController::class, 'listview'])->name('listview');
    Route::get('ptw-work-data-list', [ptw_workController::class, 'datatable'])->name('datatable');
    Route::get('ptw-work-destroy/{id}', [ptw_workController::class, 'destroy'])->name('destroy');
    Route::get('ptw-work-data-view/{id}', [ptw_workController::class, 'view'])->name('view');


});

Route::group(['middleware' => ['auth'],'name' => 'ptw_offer', 'as' => 'ptw_offer.'], function () {
    Route::get('ptw-offer', [ptw_offerController::class, 'index'])->name('index');
    Route::POST('ptw-offer-store', [ptw_offerController::class, 'store'])->name('store');
    Route::get('ptw-offer-edit/{id}', [ptw_offerController::class, 'edit'])->name('edit');
    Route::put('ptw-offer-update/{id}', [ptw_offerController::class, 'update'])->name('update');
    Route::get('ptw-offer-data-list-view', [ptw_offerController::class, 'listview'])->name('listview');
    Route::get('ptw-offer-data-list', [ptw_offerController::class, 'datatable'])->name('datatable');
    Route::get('ptw-offer-destroy/{id}', [ptw_offerController::class, 'destroy'])->name('destroy');
    Route::get('ptw-offer-data-view/{id}', [ptw_offerController::class, 'view'])->name('view');


});


Route::group(['middleware' => ['auth'],'name' => 'ptw_details', 'as' => 'ptw_details.'], function () {
    Route::get('ptw-details', [ptw_detailsController::class, 'index'])->name('index');
    Route::POST('ptw-details-store', [ptw_detailsController::class, 'store'])->name('store');
    Route::get('ptw-details-edit/{id}', [ptw_detailsController::class, 'edit'])->name('edit');
    Route::put('ptw-details-update/{id}', [ptw_detailsController::class, 'update'])->name('update');
    Route::get('ptw-details-data-list-view', [ptw_detailsController::class, 'listview'])->name('listview');
    Route::get('ptw-details-data-list', [ptw_detailsController::class, 'datatable'])->name('datatable');
    Route::get('ptw-details-destroy/{id}', [ptw_detailsController::class, 'destroy'])->name('destroy');
    Route::get('ptw-details-data-view/{id}', [ptw_detailsController::class, 'view'])->name('view');


});

Route::group(['middleware' => ['auth'],'name' => 'ptw_constractor', 'as' => 'ptw_constractor.'], function () {
    Route::get('ptw-constractor', [ptw_ConstractorController::class, 'index'])->name('index');
    Route::POST('ptw-constractor-store', [ptw_ConstractorController::class, 'store'])->name('store');
    Route::get('ptw-constractor-edit/{id}', [ptw_ConstractorController::class, 'edit'])->name('edit');
    Route::put('ptw-constractor-update/{id}', [ptw_ConstractorController::class, 'update'])->name('update');
    Route::get('ptw-constractor-data-list-view', [ptw_ConstractorController::class, 'listview'])->name('listview');
    Route::get('ptw-constractor-data-list', [ptw_ConstractorController::class, 'datatable'])->name('datatable');
    Route::get('ptw-constractor-destroy/{id}', [ptw_ConstractorController::class, 'destroy'])->name('destroy');
    Route::get('ptw-constractor-data-view/{id}', [ptw_ConstractorController::class, 'view'])->name('view');


});

Route::group(['middleware' => ['auth'],'name' => 'ptw_assination', 'as' => 'ptw_assination.'], function () {
    Route::get('ptw-assination', [ptw_AssinationController::class, 'index'])->name('index');
    Route::POST('ptw-assination-store', [ptw_AssinationController::class, 'store'])->name('store');
    Route::get('ptw-assination-edit/{id}', [ptw_AssinationController::class, 'edit'])->name('edit');
    Route::put('ptw-assination-update/{id}', [ptw_AssinationController::class, 'update'])->name('update');
    Route::get('ptw-assination-data-list-view', [ptw_AssinationController::class, 'listview'])->name('listview');
    Route::get('ptw-assination-data-list', [ptw_AssinationController::class, 'datatable'])->name('datatable');
    Route::get('ptw-assination-destroy/{id}', [ptw_AssinationController::class, 'destroy'])->name('destroy');
    Route::get('ptw-assination-data-view/{id}', [ptw_AssinationController::class, 'view'])->name('view');


});


Route::group(['middleware' => ['auth'],'name' => 'ptw_isolation', 'as' => 'ptw_isolation.'], function () {
    Route::get('ptw-isolation', [ptw_IsolationController::class, 'index'])->name('index');
    Route::POST('ptw-isolation-store', [ptw_IsolationController::class, 'store'])->name('store');
    Route::get('ptw-isolation-edit/{id}', [ptw_IsolationController::class, 'edit'])->name('edit');
    Route::put('ptw-isolation-update/{id}', [ptw_IsolationController::class, 'update'])->name('update');
    Route::get('ptw-isolation-data-list-view', [ptw_IsolationController::class, 'listview'])->name('listview');
    Route::get('ptw-isolation-data-list', [ptw_IsolationController::class, 'datatable'])->name('datatable');
    Route::get('ptw-isolation-destroy/{id}', [ptw_IsolationController::class, 'destroy'])->name('destroy');
    Route::get('ptw-isolation-data-view/{id}', [ptw_IsolationController::class, 'view'])->name('view');


});


Route::group(['middleware' => ['auth'],'name' => 'demo', 'as' => 'demo.'], function () {
    Route::get('demo', [DemoController::class, 'index'])->name('index');
    Route::POST('demo-store', [DemoController::class, 'store'])->name('store');
    Route::get('demo-edit/{id}', [DemoController::class, 'edit'])->name('edit');
    Route::put('demo-update/{id}', [DemoController::class, 'update'])->name('update');
    Route::get('demo-data-list-view', [DemoController::class, 'listview'])->name('listview');
    Route::get('demo-data-list', [DemoController::class, 'datatable'])->name('datatable');
    Route::get('demo-destroy/{id}', [DemoController::class, 'destroy'])->name('destroy');
    Route::get('demo-data-view/{id}', [DemoController::class, 'view'])->name('view');


});


Route::group(['middleware' => ['auth'], 'name' => 'erp', 'as' => 'erp.'], function () {

    Route::get('ERP-List', [ErpControllerController::class, 'index'])->name('index');
    Route::get('ERP/getData/', [ErpControllerController::class, 'getData'])->name('getData');
    Route::get('ERP/chart/', [ErpControllerController::class, 'chart'])->name('chart');
    Route::post('ERP/store', [ErpControllerController::class, 'store'])->name('store');
    Route::post('ERP/edit/{id}', [ErpControllerController::class, 'edit'])->name('edit');
    Route::post('ERP/update/{id}', [ErpControllerController::class, 'update'])->name('update');


});