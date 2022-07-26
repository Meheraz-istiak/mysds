<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Department;
use App\Models\Ptw_offer;

class ptw_offerController extends Controller
{
      public function index()
    {
         $user = Auth::user();
         $department=Department::all();
         // $Ptw_offer=Ptw_offer::all();
         $reference_no=Helper::IDGenerator(new Ptw_offer,'reference',5,'ref');

        return view('backend.PTWoffer.ptw_offer',compact('user','department','reference_no'));
    }


       public function datatable()
    {
        $users = Auth::user();
       

        $data = Ptw_offer::where('Ptw_offers.company_id', '=', $users->company_id)
            ->orderBy('Ptw_offers.id','DESC')
        ->get('Ptw_offers.*');

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('SWP', function ($query) {
                $url = asset("image/SWP/$query->SWP");
                return '<img src=' . $url . ' border="0" width="40"  class="img-rounded" align="center" />';
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('ptw_offer.edit', $query['id']) . '" class=""><i class="fas fa-edit cursor-pointer"></i></a> | <a href="' . route('ptw_offer.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This department?\')"><i class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>';
            })
            ->escapeColumns('SWP')
            ->make();
    }


    public function store(Request $request)
    {
      // dd($request);
        $input = new Ptw_offer();

        $input->reference = $request->input('reference');

        $input->Contractor_offer = $request->input('Contractor_offer');

        $input->Primary_PTW = $request->input('Primary_PTW');

        $input->Secondary_Permit = $request->input('Secondary_Permit');

        $input->Permit_Validity = $request->input('Permit_Validity');

        $input->department_id = $request->input('department_id');

        $input->workdate = $request->input('workdate');

        $input->Work_Area = $request->input('Work_Area');

        $input->Area_Authority = $request->input('Area_Authority');

        $input->Work_Type = $request->input('Work_Type');

        $input->other_area = $request->input('other_area');

        $input->Work_details = $request->input('Work_details');

        $input->Asset = $request->input('Asset');

        $input->work_affect = $request->input('work_affect');


       if ($Isolation_Procedure = $request->file('Isolation_Procedure'))
            {
                $destinationPath = 'ptw/offer';
               $profileImage = date('YmdHis') . "." . $Isolation_Procedure->getClientOriginalExtension();
                $profileImage = $Isolation_Procedure->getClientOriginalName();
                $Isolation_Procedure->move($destinationPath, $profileImage);


                $input['Isolation_Procedure'] = $profileImage;
            }
         $input->company_id = Auth::user()->company_id;   

        $input->save();
        session()->flash('message','Data has been saved successfully !!');
        return redirect()->back();


    }

    public function edit($id)
    {
       $user = Auth::user();

       $department=Department::all();


       $Ptwoffer = Ptw_offer::where('id', $id)->first();

       $reference_no=Helper::IDGenerator(new Ptw_offer,'reference',5,'ref');

       $data = Ptw_offer::where('id', $id)->first();

       return view('backend.PTWoffer.edit',compact('user','Ptwoffer','data','reference_no','department'));


    }



     public function update(Request $request, $id)
     {


        $input = Ptw_offer::find($id);

        $input->reference = $request->input('reference');

        $input->Contractor_offer = $request->input('Contractor_offer');

        $input->Primary_PTW = $request->input('Primary_PTW');

        $input->Secondary_Permit = $request->input('Secondary_Permit');

        $input->Permit_Validity = $request->input('Permit_Validity');

        $input->department_id = $request->input('department_id');

        $input->workdate = $request->input('workdate');

        $input->Work_Area = $request->input('Work_Area');

        $input->Area_Authority = $request->input('Area_Authority');

        $input->Work_Type = $request->input('Work_Type');

        $input->other_area = $request->input('other_area');

        $input->Work_details = $request->input('Work_details');

        $input->Asset = $request->input('Asset');

        $input->work_affect = $request->input('work_affect');


       if ($Isolation_Procedure = $request->file('Isolation_Procedure'))
            {
                $destinationPath = 'ptw/offer';
               $profileImage = date('YmdHis') . "." . $Isolation_Procedure->getClientOriginalExtension();
                $profileImage = $Isolation_Procedure->getClientOriginalName();
                $Isolation_Procedure->move($destinationPath, $profileImage);


                $input['Isolation_Procedure'] = $profileImage;
            }

        $input->update();
        session()->flash('message','Data has been saved successfully !!');
        return redirect()->back();



     }


   public function destroy($id)

    {

        $Ptwoffer = Ptw_offer::findOrFail($id);

       if ($Ptwoffer)
         {
            $Ptwoffer->delete();
            return redirect()->back()->with('success', 'Department information successfully deleted.');
        }

    }




}
