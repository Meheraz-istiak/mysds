<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ptw_Isolation;


class ptw_IsolationController extends Controller
{
   public function index()
    {   
         $user = Auth::user();

        return view('backend.ptwisolation.ptw_isolation',compact('user'));
    }


    public function datatable()
    {
        $users = Auth::user();
        $data=Ptw_Isolation::all();

        // $data = Ptw_details::where('ptw_detailss.company_id', '=', $users->company_id)
        //     ->orderBy('departments.id','DESC')
        // ->get('departments.*');

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('SWP', function ($query) {
                $url = asset("image/SWP/$query->SWP");
                return '<img src=' . $url . ' border="0" width="40"  class="img-rounded" align="center" />';
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('ptw_isolation.edit', $query['id']) . '" class=""><i class="fas fa-edit cursor-pointer"></i></a> | <a href="' . route('ptw_isolation.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This department?\')"><i class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>';
            })
            ->escapeColumns('SWP')
            ->make();
    }


    public function store(Request $request)
    {

      // dd($request->Contractor_Name);

      $input = new Ptw_Isolation();

        $input->Isolation_Certificate = $request->input('Isolation_Certificate');

        $input->Request_Ref = $request->input('Request_Ref');

        $input->PTW_Ref = $request->input('PTW_Ref');

        $input->Isolation_Date = $request->input('Isolation_Date');

        $input->Isolation_Time = $request->input('Isolation_Time');

        $input->Loto_Box = $request->input('Loto_Box');

        $input->Isolation_Detail = $request->input('Isolation_Detail');

        $input->Confirmation_Date = $request->input('Confirmation_Date');

        $input->Confirmation_Time = $request->input('Confirmation_Time');

        $input->Isolation_Details = $request->input('Isolation_Details');

        $input->Contractor_Name = $request->input('Contractor_Name');

        $input->Signature_Date = $request->input('Signature_Date');
          
        $input->Signature_Time = $request->input('Signature_Time');    

        $input->Issuer_Date = $request->input('Issuer_Date');

        $input->Issuer_Time = $request->input('Issuer_Time');

        $input->Deisolation_Table = $request->input('Deisolation_Table');

       if ($Isolator_Signature = $request->file('Isolator_Signature'))
            {
                $destinationPath = 'ptw/isolation';
               $profileImage = date('YmdHis') . "." . $Isolator_Signature->getClientOriginalExtension();
                $profileImage = $Isolator_Signature->getClientOriginalName();
                $Isolator_Signature->move($destinationPath, $profileImage);


                $input['Isolator_Signature'] = $profileImage;
            }

             if ($Issuer_Signature = $request->file('Issuer_Signature'))
            {
                $destinationPath = 'ptw/isolation';
               $profileImage = date('YmdHis') . "." . $Issuer_Signature->getClientOriginalExtension();
                $profileImage = $Issuer_Signature->getClientOriginalName();
                $Issuer_Signature->move($destinationPath, $profileImage);


                $input['Issuer_Signature'] = $profileImage;
            }

             if ($Contractor_Signature = $request->file('Contractor_Signature'))
            {
                $destinationPath = 'ptw/isolation';
               $profileImage = date('YmdHis') . "." . $Contractor_Signature->getClientOriginalExtension();
                $profileImage = $Contractor_Signature->getClientOriginalName();
                $Contractor_Signature->move($destinationPath, $profileImage);


                $input['Contractor_Signature'] = $profileImage;
            }

             if ($Contractor_Signatures    = $request->file('Contractor_Signatures'))
            {
                $destinationPath = 'ptw/isolation';
            $profileImage = date('YmdHis') . "." . $Contractor_Signatures->getClientOriginalExtension();
                $profileImage = $Contractor_Signatures->getClientOriginalName();
                $Contractor_Signatures->move($destinationPath, $profileImage);


                $input['Contractor_Signatures'] = $profileImage;
            }

             if ($PTW_Issuer = $request->file('PTW_Issuer'))
            {
                $destinationPath = 'ptw/isolation';
               $profileImage = date('YmdHis') . "." . $PTW_Issuer->getClientOriginalExtension();
                $profileImage = $PTW_Issuer->getClientOriginalName();
                $PTW_Issuer->move($destinationPath, $profileImage);


                $input['PTW_Issuer'] = $profileImage;
            }
            
          $input->company_id = Auth::user()->company_id;   

        $input->save();
        session()->flash('message','Data has been saved successfully !!');
        return redirect()->route('ptw_isolation.listview')->with('success','Data updated Successfully');


    }



       public function listview()
    {
         $user = Auth::user();
          $Isolation=Ptw_Isolation::all();

         return view('backend.ptwisolation.list',compact('user','Isolation'));



    }

     public function destroy($id)

    {

        $Isolation = Ptw_Isolation::findOrFail($id);

        if ($Isolation)
        {
            $Isolation->delete();
            return redirect()->back()->with('success', 'Isolation information successfully deleted.');
        }
    }
    

}
