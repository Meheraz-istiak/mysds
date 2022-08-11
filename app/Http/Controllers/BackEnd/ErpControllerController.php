<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

use App\Models\l_employee;

use App\Models\ERP;

use Illuminate\Http\File;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use function compact;

use function dd;

use function view;

class ErpControllerController extends Controller
{

     public function index()

    {

        $user = Auth::user();

        $employees = l_employee::orderBy('id', 'desc')
            ->leftjoin('erps', 'erps.employee_id', '=', 'l_employees.id')
            ->select('l_employees.*', 'erps.employee_id', 'erps.designation')
            ->whereNull('erps.designation')
            ->where('l_employees.company_id', '=', $user->company_id)
            ->get();


        $companies = CompanyProfile::where('id', '=', $user->company_id)->get();

       

        $emergency_manager = DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Emergency Manager')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();


        $Security_Manager = DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Security Manager')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $incident_manager= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Incident Manager')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

       $search_rescue_team= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Search Rescue Team')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $medic_team= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Medic Team')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $area_warden= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Area Warden')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $traffic_control= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Traffic Control')
            ->where('emp.company_id', '=', $user->company_id)
            ->get(); 
            

        $id = '';

        return view('backend.ERP.index',

               compact('user', 'employees', 'id','companies', 'Security_Manager','emergency_manager',

                'incident_manager','search_rescue_team','medic_team','area_warden','traffic_control'));

    }


    public function getData()

    {
        $user = Auth::user();
        $employees = l_employee::all();

        $emergency_manager = DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Emergency Manager')
            ->get();

         $Security_Manager = DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Security Manager')
            ->get();

        $incident_manager = DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Incident Manager')
            ->get();

        $search_rescue_team= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Search Rescue Team')
            ->get();

        $medic_team= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Medic Team')
            ->get();

        $area_warden= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Area Warden')
            ->get();

        $traffic_control= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Traffic Control')
            ->get();



            // dd($traffic_contro);

        return response()->json([


            'emergency_manager' => $emergency_manager,

            'Security_Manager' => $Security_Manager,

            'incident_manager' => $incident_manager,

            'search_rescue_team' => $search_rescue_team,

            'medic_team' => $medic_team,

            'area_warden' => $area_warden,

            'traffic_control' => $traffic_control,

            'employees' => $employees,

        ], 200);

    }


    public function chart()

    {

        $user = Auth::user();

       

        $emergency_manager = DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Emergency Manager')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();   

        $Security_Manager = DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Security Manager')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $incident_manager = DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Incident Manager')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $search_rescue_team= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Search Rescue Team')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $medic_team= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Medic Team')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $area_warden= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Area Warden')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $traffic_control= DB::table('erps as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Traffic Control')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        return view('backend.ERP.ERT_chart', 

               compact('user','Security_Manager','emergency_manager','incident_manager',

                'search_rescue_team','medic_team','area_warden','traffic_control'));

    }

    public function store(Request $request)

    {


        $request->validate([

            'employee_id' => 'required',

            'designation' => 'required',


        ]);

        $input = new ERP();

        $input->employee_id = $request->input('employee_id');

        $input->designation = $request->input('designation');

        $input->photo = 'Y';

        $input->save();

        // return json_encode($input, 200);
        return redirect()->back();


    }

    public function edit(Request $request, $id)

    {

        $id = $request->id;

        $erp = ERP::find($id);

        return response()->json(['erp' => $erp]);

    }

    public function update(Request $request, $id)

    {

        $request->validate([

            'employee_id' => 'required',

            'designation' => 'required',


        ]);

        $update = ERP::find($id);

        $currentPhoto = $update->photo;

        $update->employee_id = $request->input('employee_id');

        $update->designation = $request->input('designation');

        $update->update();



        return json_encode($update, 200);

    }

    public function committeedetails()
    {


    }
    
}
