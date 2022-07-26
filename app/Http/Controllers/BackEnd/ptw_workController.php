<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Ptw_work;
use App\Models\Department;
class ptw_workController extends Controller
{
    public function index()
    {   
         $user = Auth::user();
         $department=Department::all();
         
         // $Ptwwork = DB::selectOne("SELECT p.*,d.depertment_name FROM ptw_works p
         //                    LEFT JOIN departments d on d.id =p.depertment_id ");

         $reference_no=Helper::IDGenerator(new Ptw_work,'reference',5,'ref');

        return view('backend.PTWwork.ptw_work',compact('user','department','reference_no'));
    }


     public function datatable()
    {
        $users = Auth::user();
        

        $data = Ptw_work::where('Ptw_works.company_id', '=', $users->company_id)
            ->orderBy('Ptw_works.id','DESC')
        ->get('Ptw_works.*');

        return datatables()
            ->of($data)
            ->addIndexColumn()
          
            ->editColumn('action', function ($query) {
                return '<a href="' . route('ptw_work.edit', $query['id']) . '" class=""><i class="fas fa-edit cursor-pointer"></i></a> | <a href="' . route('ptw_work.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This ptw work?\')"><i class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>';
            })
            
            ->make();
    }

    public function store(Request $request )

    {
// dd($request);
        

        $input = new Ptw_work();
        $input->reference = $request->input('reference');
        $input->depertment_id = $request->input('depertment_id');
        $input->work_type = $request->input('work_type');
        $input->work_detalis = $request->input('work_detalis');
        $input->work_area = $request->input('work_area');
        $input->work_affect = $request->input('work_affect');
        $input->effected_area = $request->input('effected_area');
        $input->Assest_name = $request->input('Assest_name');
        $input->Assest_id = $request->input('Assest_id');
        $input->start_date = $request->input('start_date');
        $input->creferred_contractor = $request->input('creferred_contractor');
        

       if ($Isolation_file = $request->file('Isolation_file'))
            {
                $destinationPath = 'ptw/work';
                $profileImage = date('YmdHis') . "." . $Isolation_file->getClientOriginalExtension();
                $profileImage = $Isolation_file->getClientOriginalName();
                $Isolation_file->move($destinationPath, $profileImage);


                $input['Isolation_file'] = $profileImage;
            }
         $input->company_id = Auth::user()->company_id;

        $input->save();
        // session()->flash('message','Data has been saved successfully !!');
         return redirect()->route('ptw_work.listview')->with('success','Data updated Successfully');
       



    }

    public function edit($id)
    {
         $user = Auth::user();
         $reference_no=Helper::IDGenerator(new Ptw_work,'reference',5,'ref');
         $department=Department::all();
         $data = Ptw_work::where('id', $id)->first();

         $Ptwwork = DB::selectOne("SELECT p.*,d.depertment_name FROM ptw_works p
                            LEFT JOIN departments d on d.id =p.depertment_id where p.id='$id'");

         


         
        

         return view('backend.PTWwork.edit',compact('user','department','Ptwwork','data','reference_no'));



    }



      public function update(Request $request, $id)
      {
        $input = Ptw_work::find($id);

        $input->reference = $request->input('reference');
        $input->depertment_id = $request->input('depertment_id');
        $input->work_type = $request->input('work_type');
        $input->work_detalis = $request->input('work_detalis');
        $input->work_area = $request->input('work_area');
        $input->work_affect = $request->input('work_affect');
        $input->effected_area = $request->input('effected_area');
        $input->Assest_name = $request->input('Assest_name');
        $input->Assest_id = $request->input('Assest_id');
        $input->start_date = $request->input('start_date');
        $input->creferred_contractor = $request->input('creferred_contractor');
        

       if ($Isolation_file = $request->file('Isolation_file'))
            {
                $destinationPath = 'ptw/work';
               $profileImage = date('YmdHis') . "." . $Isolation_file->getClientOriginalExtension();
                $profileImage = $Isolation_file->getClientOriginalName();
                $Isolation_file->move($destinationPath, $profileImage);


                $input['Isolation_file'] = $profileImage;
            }

        $input->update();
        // session()->flash('message','Data has been saved successfully !!');
         return redirect()->route('ptw_work.listview')->with('success','Data updated Successfully');


      }

       public function listview()
    {
         $user = Auth::user();
         
         $department=Department::all();
         

         $Ptwwork = DB::select("SELECT p.*,d.depertment_name FROM ptw_works p
                            LEFT JOIN departments d on d.id =p.depertment_id ");


         
         return view('backend.PTWwork.ptw_list',compact('user','department','Ptwwork'));



    }


     public function destroy($id)

    {

        $Ptwwork = Ptw_work::findOrFail($id);

       if ($Ptwwork)
         {
            $Ptwwork->delete();
            return redirect()->back()->with('success', 'Department information successfully deleted.');
        }

    }
}
