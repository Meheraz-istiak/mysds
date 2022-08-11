<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\I_hirarc;
use App\Models\hazard;
use App\Models\c_job;
use App\Models\Designation;
use App\Models\l_employee;
use App\Models\Department;
use function dd;


class HirarcController extends Controller
{


    public function index()
    {
        $user = Auth::user();
        $department = Department::where('company_id', '=', $user->company_id)->get();
        $Designation = Designation::where('company_id', '=', $user->company_id)->get();
        $l_employee = l_employee::where('company_id', '=', $user->company_id)->get();

        $reference_no=Helper::IDGenerator(new I_hirarc,'reference_no',5,'Ref');
        
        $data = DB::table('i_hirarcs')
            ->join('departments', 'i_hirarcs.depertment_id', 'departments.id')
            ->select('i_hirarcs.*', 'departments.depertment_name')
            ->where('i_hirarcs.company_id', '=', $user->company_id)->get();

        $data1 = DB::table('i_hirarcs')
            ->join('designations', 'i_hirarcs.designation_id', 'designations.id')
            ->select('i_hirarcs.*', 'designations.ds_name')
            ->where('i_hirarcs.company_id', '=', $user->company_id)->get();


        $data2 = DB::table('i_hirarcs')
            ->join('l_employees', 'i_hirarcs.employee_id', 'l_employees.id')
            ->select('i_hirarcs.*', 'l_employees.em_name')
            ->where('i_hirarcs.company_id', '=', $user->company_id)->get();


        return view('backend.hirarc.hirarc', compact('user','l_employee','Designation','department','data','data1','data2','reference_no'));


    }


    public function store(Request $request)

    {


        $user = Auth::user();

        $input = new I_hirarc();
        $input->depertment_id = $request->input('depertment_id');
        $input->process = $request->input('process');
        $input->location = $request->input('location');
        $input->rm_assessor = $request->input('rm_assessor');
        $input->rm_member1 = $request->input('rm_member1');
        $input->rm_member2 = $request->input('rm_member2');
        $input->rm_member3 = $request->input('rm_member3');
        $input->rm_member4 = $request->input('rm_member4');
        $input->last_assessment = $request->input('last_assessment');
        $input->assessment_date = $request->input('assessment_date');
        $input->designation_id = $request->input('designation_id');
        $input->employee_id = $request->input('employee_id');
        $input->date = $request->input('date');
        $input->reference_no = $request->input('reference_no');
        $input->company_id =$user->company_id;
         $input->save();

        return redirect()->back()->with('success', 'Data has been saved successfully !!');



    }


    public function getempdesignation($id)
    {

        $designation = DB::selectOne("SELECT d.id, d.ds_name from designations d
            left join l_employees e on e.em_designation = d.id
            where e.id =  '$id'");
        return $designation;

    }


    public function listview()
    {


        $user = Auth::user();

        $data1 = DB::select("SELECT a.*,d.depertment_name,c.job_activity from hazards a
                            left join departments d on d.id = a.depertment_id
                            left JOIN c_jobs c on c.id =a.job_activity_id where a.company_id = '$user->company_id'  ORDER by a.id desc");
        // dd($data1);
        $data = DB::select("SELECT a.*,d.depertment_name,e.em_name as rm, e1.em_name as rm1,e2.em_name as rm2, e3.em_name as rm3, e4.em_name as rm4,emp.em_name as employee_name,de.ds_name from i_hirarcs a
                            left join departments d on d.id = a.depertment_id
                            left JOIN l_employees e on e.id =a.rm_assessor
                            left JOIN l_employees e1 on a.rm_member1 = e1.id
                            left JOIN l_employees e2 on a.rm_member2 = e2.id
                            left JOIN l_employees e3 on a.rm_member3 = e3.id
                            left JOIN l_employees e4 on a.rm_member4 = e4.id
                            left JOIN l_employees emp on a.employee_id = emp.id
                            LEFT JOIN designations de on de.id =a.designation_id where a.company_id = $user->company_id");


        return view('backend.hirarc.hirarc_list', compact('user', 'data', 'data1'));

    }


    public function view($id)
    {

        $user = Auth::user();
        $department = Department::where('company_id', '=', $user->company_id)->get();
        $Designation = Designation::where('company_id', '=', $user->company_id)->get();
        $l_employee = l_employee::where('company_id', '=', $user->company_id)->get();


        $data1 = DB::table('i_hirarcs')
            ->join('departments', 'i_hirarcs.depertment_id', '=', 'departments.id')
            ->join('l_employees as em1', 'i_hirarcs.employee_id', '=', 'em1.id')
            ->join('l_employees as em2', 'i_hirarcs.rm_assessor', '=', 'em2.id')
            ->join('l_employees as em3', 'i_hirarcs.rm_member1', '=', 'em3.id')
            ->join('l_employees as em4', 'i_hirarcs.rm_member2', '=', 'em4.id')
            ->join('l_employees as em5', 'i_hirarcs.rm_member3', '=', 'em5.id')
            ->join('l_employees as em6', 'i_hirarcs.rm_member4', '=', 'em6.id')
            ->select('departments.depertment_name', 'em1.em_name as m1', 'em2.em_name as m2', 'em3.em_name as m3', 'em4.em_name as m4', 'em5.em_name as m5', 'em6.em_name as m6', 'i_hirarcs.process', 'i_hirarcs.location', 'i_hirarcs.rm_assessor', 'i_hirarcs.rm_member2', 'i_hirarcs.Reference_no', 'i_hirarcs.date', 'i_hirarcs.assessment_date', 'i_hirarcs.id')
            ->where([
                ['i_hirarcs.id', '=', $id],
            ])->first();



        return view('backend.hirarc.view_hirarc', compact('user', 'l_employee', 'Designation', 'department', 'data1'));

    }


    public function destroy($id)

    {
        DB::table("i_hirarcs")->where("id", $id)->delete();

        return redirect()->back()->with('success', 'Hirarc information successfully deleted.');

    }



    public function edit($id)
    {
        $user = Auth::user();
        $department = Department::where('company_id', '=', $user->company_id)->get();
        $Designation = Designation::where('company_id', '=', $user->company_id)->get();
        $l_employee = l_employee::where('company_id', '=', $user->company_id)->get();
         $data =DB::table('i_hirarcs as h')
             ->leftJoin('designations as d', 'd.id', '=','h.designation_id' )
         ->where('h.id','=', $id)
             ->select('h.*','d.ds_name')->first();


         $data1= I_hirarc::where('id', $id)->first();

           $data3 = DB::table('i_hirarcs')
               ->join('departments','i_hirarcs.depertment_id','departments.id')

               ->select('i_hirarcs.*','departments.depertment_name')->get();


          return view('backend.hirarc.edit', compact('user','l_employee','Designation','department','data','data1','data3'));
    }





    public function update(Request $request, $id)
    {

        $input = I_hirarc::find($id);
        $input->depertment_id = $request->input('depertment_id');
        $input->process = $request->input('process');
        $input->location = $request->input('location');
        $input->rm_assessor = $request->input('rm_assessor');
        $input->rm_member1 = $request->input('rm_member1');
        $input->rm_member2 = $request->input('rm_member2');
        $input->rm_member3 = $request->input('rm_member3');
        $input->rm_member4 = $request->input('rm_member4');
        $input->last_assessment = $request->input('last_assessment');
        $input->assessment_date = $request->input('assessment_date');
        $input->designation_id = $request->input('designation_id');
        $input->employee_id = $request->input('employee_id');
        $input->date = $request->input('date');
        $input->reference_no = $request->input('reference_no');

        $input->update();

       return redirect()->route('hirarc.listview')->with('success', 'Hirarc has been Updated successfully');



    }
}



