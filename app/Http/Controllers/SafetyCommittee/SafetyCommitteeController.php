<?php


namespace App\Http\Controllers\SafetyCommittee;


use App\Http\Controllers\Controller;

use App\Models\CompanyProfile;

use App\Models\l_employee;

use App\Models\SafetyCommittee;

use Illuminate\Http\File;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use function compact;

use function dd;

use function view;


class SafetyCommitteeController extends Controller

{

    public function index()

    {

        $user = Auth::user();

        $employees = l_employee::orderBy('id', 'desc')
            ->leftjoin('safety_committees', 'safety_committees.employee_id', '=', 'l_employees.id')
            ->select('l_employees.*', 'safety_committees.employee_id', 'safety_committees.designation')
            ->whereNull('safety_committees.designation')
            ->where('l_employees.company_id', '=', $user->company_id)
            ->get();


        $companies = CompanyProfile::where('id', '=', $user->company_id)->get();

        $chairman = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Chairman')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();
//        dd($chairman);

        $secretary = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Secretary')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $employee_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'EMPLOYEE REPRESENTATIVE')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $management_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'MANAGEMENT/EMPLOYER REPRESENTATIVE')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $id = '';

        return view('backend.safetycommittee.index',

            compact('user', 'employees', 'id', 'secretary',

                'employee_representative', 'companies',

                'management_representative', 'chairman'));

    }


    public function getData()

    {
        $user = Auth::user();
        $employees = l_employee::all();


        $chairman = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Chairman')
            ->get();

        $secretary = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Secretary')
            ->get();

        $employee_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'EMPLOYEE REPRESENTATIVE')
            ->get();

        $management_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'MANAGEMENT/EMPLOYER REPRESENTATIVE')
            ->get();

        return response()->json([

            'secretary' => $secretary,

            'chairman' => $chairman,

            'employee_representative' => $employee_representative,

            'management_representative' => $management_representative,

            'employees' => $employees,

        ], 200);

    }


    public function chart()

    {

        $user = Auth::user();

        $chairman = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Chairman')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $secretary = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'Secretary')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $employee_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'EMPLOYEE REPRESENTATIVE')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        $management_representative = DB::table('safety_committees as sc')
            ->leftJoin('l_employees as emp', 'emp.id', '=', 'sc.employee_id')
            ->leftJoin('designations as d', 'd.id', '=', 'emp.em_designation')
            ->select('sc.*', 'emp.em_name', 'emp.em_ic_passport_no', 'emp.em_profile', 'd.ds_name')
            ->where('sc.designation', '=', 'MANAGEMENT/EMPLOYER REPRESENTATIVE')
            ->where('emp.company_id', '=', $user->company_id)
            ->get();

        return view('backend.safetycommittee.chart', compact('user', 'chairman',

            'secretary', 'employee_representative', 'management_representative'));

    }

    public function store(Request $request)

    {


        $request->validate([

            'employee_id' => 'required',

            'designation' => 'required',


        ]);

        $input = new SafetyCommittee();

        $input->employee_id = $request->input('employee_id');

        $input->designation = $request->input('designation');
        $input->photo = 'Y';

        $input->save();

        return json_encode($input, 200);

    }

    public function edit(Request $request, $id)

    {

        $id = $request->id;

        $safety_committee = SafetyCommittee::find($id);

        return response()->json(['safety_committee' => $safety_committee]);

    }

    public function update(Request $request, $id)

    {

        $request->validate([

            'employee_id' => 'required',

            'designation' => 'required',


        ]);

        $update = SafetyCommittee::find($id);

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

