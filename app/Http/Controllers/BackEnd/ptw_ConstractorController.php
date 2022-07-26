<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ptw_Constractor;


class ptw_ConstractorController extends Controller
{
   function index()
    {   
         $user = Auth::user();
         $PtwConstractor=Ptw_Constractor::all();

        return view('backend.PTWconstractor.ptw_constractor',compact('user','PtwConstractor'));
    }


       public function datatable()
    {
        $users = Auth::user();
       

        $data = Ptw_Constractor::where('Ptw_Constractors.company_id', '=', $users->company_id)
            ->orderBy('Ptw_Constractors.id','DESC')
        ->get('Ptw_Constractors.*');

        return datatables()
            ->of($data)
            ->addIndexColumn()
           
            ->editColumn('action', function ($query) {
                return '<a href="' . route('ptw_constractor.edit', $query['id']) . '" class=""><i class="fas fa-edit cursor-pointer"></i></a> | <a href="' . route('ptw_constractor.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This department?\')"><i class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>';
            })
            
            ->make();
    }
    

    public function store(Request $request)
   {
        // dd($request);
         $count = $request->ptw_name;

         foreach($count as $main=>$row)
         {


        $input = new Ptw_Constractor();
        $input->company_id = Auth::user()->company_id; 
        $input->Contractor_ID = $request->input('Contractor_ID');
        $input->Contractor_Name = $request->input('Contractor_Name');
        $input->Start_Date = $request->input('Start_Date');
        $input->Start_Time = $request->input('Start_Time');
        $input->End_Date = $request->input('End_Date');
        $input->End_Time = $request->input('End_Time');
        $input->work_flow = $request->input('work_flow');
        $input->Isolation_Required = $request->input('Isolation_Required');
        
        $input->PPE_Required = $request->input('PPE_Required');

        $input->ptw_offer = $request->input('ptw_offer');

        if ($SWP = $request->file('SWP') )
            {
                $destinationPath = 'ptw/Constractor';
//                $profileImage = date('YmdHis') . "." . $imagefile->getClientOriginalExtension();
                $profileImage = $SWP->getClientOriginalName();
                $SWP->move($destinationPath, $profileImage);
                $input['SWP'] = $profileImage;
            }

        $input->ptw_name = $request->ptw_name[$main];
        $input->ptw_phone = $request->ptw_phone[$main];
        $input->ptw_id = $request->ptw_id[$main];
        // dd($input);
        $input->save();


       }
        session()->flash('message','Data has been saved successfully !!');
         return redirect()->back(); 
      

   }

   public function edit($id)
    { 
       $user = Auth::user();

       $data = Ptw_Constractor::where('id', $id)->first();

       $PtwConstractor = DB::selectOne("SELECT p.*FROM Ptw_constractors p
                             where p.id='$id'");
       // dd($PtwConstractor);

       return view('backend.PTWconstractor.edit',compact('user','PtwConstractor','data'));

     }   



    public function destroy($id)

    {

        $job = Ptw_Constractor::findOrFail($id);

        if ($job)
        {
            $job->delete();
            return redirect()->back()->with('success', 'Department information successfully deleted.');
        }

    }
}
