<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Ptw_details;

class ptw_detailsController extends Controller
{
      public function index()
    {   
         $user = Auth::user();
         
         $reference_no=Helper::IDGenerator(new Ptw_details,'PTW_Ref',5,'ref');
         // dd($reference_no);
         return view('backend.PTWdetails.ptw_details',compact('user','reference_no'));
    }

      public function datatable()
    {
        $users = Auth::user();
        

        $data = Ptw_details::where('ptw_detailss.company_id', '=', $users->company_id)
            ->orderBy('ptw_detailss.id','DESC')
        ->get('ptw_detailss.*');

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('SWP', function ($query) {
                $url = asset("image/SWP/$query->SWP");
                return '<img src=' . $url . ' border="0" width="40"  class="img-rounded" align="center" />';
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('ptw_details.edit', $query['id']) . '" class=""><i class="fas fa-edit cursor-pointer"></i></a> | <a href="' . route('ptw_details.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This department?\')"><i class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>';
            })
            ->escapeColumns('SWP')
            ->make();
    }


  public function store(Request $request)
    {
      
      // dd($request);
       $count = $request->Equipment_pre_fill;

    foreach($count as $main=>$row)
     {

        $input = new Ptw_details();
        $input->company_id = Auth::user()->company_id; 

        $input->Primary_PTW = $request->input('Primary_PTW');

        $input->Secondary_PTW = $request->input('Secondary_PTW');

        $input->PTW_Ref = $request->input('PTW_Ref');

        $input->Permit_Duration = $request->input('Permit_Duration');

        $input->Isolation_Required = $request->input('Isolation_Required');

        $input->Start_Date = $request->input('Start_Date');

        $input->End_Date = $request->input('End_Date');

        $input->work_flow = $request->input('work_flow');

        $input->workers_pre_fill = $request->input('workers_pre_fill');

        $input->phone_no = $request->input('phone_no');

        $input->ptw_id = $request->input('ptw_id');

        $input['ppe_required'] = json_encode($request->ppe_required);
          
        
        

       if ($SWP = $request->file('SWP'))
            {
                $destinationPath = 'ptw/SWP';
               // $profileImage = date('YmdHis') . "." . $SWP->getClientOriginalExtension();
                $profileImage = $SWP->getClientOriginalName();
                $SWP->move($destinationPath, $profileImage);


                $input['SWP'] = $profileImage;
            }
             $input->Equipment_pre_fill=$request->Equipment_pre_fill[$main];
             $input->save();
      }


       
        
        
        return redirect()->back()->with('success', 'Data successfully Added.');


    }

    public function edit($id)
    { 
       $user = Auth::user();
       
       
      

       $Ptw_details = DB::selectOne("SELECT p.*FROM Ptw_detailss p
                             where p.id='$id'");
       
       $reference_no=Helper::IDGenerator(new Ptw_details,'PTW_Ref',5,'ref');
       // $data = Ptw_details::where('id', $id)->first();

       return view('backend.PTWdetails.edit',compact('user','Ptw_details','reference_no'));


    }



    public function destroy($id)

    {

        $Ptwdetails = Ptw_details::findOrFail($id);

       if ($Ptwdetails)
         {
            $Ptwdetails->delete();
            return redirect()->back()->with('success', 'Data information successfully deleted.');
        }

    }

}
