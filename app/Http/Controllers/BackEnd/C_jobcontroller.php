<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\I_hirarc;
use App\Models\hazard;
use App\Models\Designation;
use App\Models\l_employee;
use App\Models\Department;
use App\Models\c_job;
use Yajra\DataTables\DataTables;
use function dd;
use function response;
use function view;

class C_jobcontroller extends Controller
{

    public function index()
    {


        $user = Auth::user();
        $department = Department::where('company_id', '=', $user->company_id)->get();
        $Designation = Designation::where('company_id', '=', $user->company_id)->get();
        $l_employee = l_employee::where('company_id', '=', $user->company_id)->get();
        $data = DB::select("SELECT c.*,d.depertment_name from c_jobs c
                            left join departments d on d.id = c.depertment_id order  by c.id desc ");

        return view('backend.hirarc.create_job.create_job', compact('user', 'l_employee', 'Designation', 'department', 'data'));
    }


    public function store(Request $request)

    {

        $user = Auth::user();
        $count = $request->job_activity;


        foreach ($count as $main => $row) {
            $input1 = new c_job();

            $input1->depertment_id = $request->input('depertment_id');
            if ($imagefile = $request->file('imagefile') [$main]) {
                $destinationPath = 'image/jobimage';
//                $profileImage = date('YmdHis') . "." . $imagefile->getClientOriginalExtension();
                $profileImage = $imagefile->getClientOriginalName();
                $imagefile->move($destinationPath, $profileImage);


                $input1['image'] = $profileImage;
            }
            $input1->job_activity = $request->job_activity[$main];
            $input1->company_id = $user->company_id;


            $input1->save();

        }

        session()->flash('success', 'Data has been saved successfully !!');
        return redirect()->back();


    }

    public function destroy($id)

    {

        $c_job = c_job::findOrFail($id);

        if ($c_job) {
            $c_job->delete();
            return redirect()->back()->with('success', 'Department information successfully deleted.');
        }

    }


    public function edit($id)
    {
        $user = Auth::user();

        $department = Department::where('company_id', '=', $user->company_id)->get();
        $data = c_job::where('id', $id)->first();

        $data1 = DB::select("SELECT c.*,d.depertment_name from c_jobs c
                            left join departments d on d.id = c.depertment_id");
        return view('backend.hirarc.create_job.edit_job', compact('user', 'department', 'data', 'data1'));
    }


    public function update(Request $request, $id)

    {
//         dd($request);
        $user = Auth::user();
        $count = $request->job_activity;


        $input1 = c_job::find($id);
        $input1->depertment_id = $request->input('depertment_id');
        if ($imagefile = $request->file('imagefile')) {
            $destinationPath = 'image/jobimage';
//                $profileImage = date('YmdHis') . "." . $imagefile->getClientOriginalExtension();
            $profileImage = $imagefile->getClientOriginalName();
            $imagefile->move($destinationPath, $profileImage);
            $input1['image'] = $profileImage;
        }
        $input1->job_activity = $request->job_activity;
        $input1->company_id = $user->company_id;
        $input1->update();


        return redirect()->route('c_job.index')->with('success', 'Data has been updated successfully !!');


    }


    public function listview()
    {


        $user = Auth::user();
        $department = Department::all();

        $job_data = c_job::with('hazard', 'department')
            ->has('hazard')
            ->get();

        $seq_job_data = Department::with('hazardData')
            ->has('hazardData')
            ->get();

        $job_act_as = hazard::with('c_jobData', 'departmentData')
            ->has('departmentData')
            ->get();

        $job_act = DB::select("SELECT DISTINCT  c.id, h.job_activity_id , c.job_activity, c.depertment_id, d.depertment_name from hazards h LEFT join c_jobs c on c.id = h.job_activity_id LEFT JOIN departments d on d.id = c.depertment_id where c.company_id = $user->company_id" );

        $seq_job = [];
        foreach ($job_act as $key => $values) {
            $seq_job[$key] = DB::select("SELECT c.id, c.job_activity, h.sequence_job from hazards h , c_jobs c WHERE h.job_activity_id = c.id and c.company_id = $user->company_id and
h.job_activity_id =" . $values->id);
        }
        $data = DB::select("SELECT c.*,h.*,d.depertment_name from hazards c
                            left join departments d on d.id = c.depertment_id
                            left JOIN c_jobs h on h.id =c.job_activity_id where c.company_id = $user->company_id");

        return view('backend.hirarc.create_job.list_of_activity', compact('user', 'data', 'job_act', 'seq_job', 'job_data', 'department'));

    }


    public function datatable(Request $request)
    {


        $data = c_job::with('hazard', 'department')
            ->has('hazard')
            ->where('company_id', '=', Auth::user()->company_id)
            ->orderBy('id','desc')
            ->get();


        if ($request->ajax()) {
            try {
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('sequence_job', function ($row) {
                        $hazard = '';
                        foreach ($row->hazard as $haz) {
                            $hazard .= '<li>' . $haz->sequence_job . '<br></li>';
                        }
                        return $hazard;
                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<a href="javascript:void(0)" class="eye btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';

                        return $btn;
                    })
//                    ->rawColumns(['action'])
                    ->escapeColumns([])
                    ->make(true);
            } catch (Exception $e) {
            }
        }

        return view('backend.hirarc.create_job.list_of_activity');

//        return response()->json([
//            'job_data'=>$job_data
//        ]);

    }


    public function droponchange(Request $request, $id)
    {


        $data = c_job::with('hazard', 'department')
            ->has('hazard')
            ->where('depertment_id', $id)
            ->where('company_id', '=', Auth::user()->company_id)
            ->get();


        return response()->json([
            'data' => $data
        ]);



    }

}
