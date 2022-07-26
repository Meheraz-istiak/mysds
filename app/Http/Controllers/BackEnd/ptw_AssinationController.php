<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ptw_Assination;

class ptw_AssinationController extends Controller
{
         public function index()
    {   
         $user = Auth::user();
         


        return view('backend.PTWassination.ptw_assination',compact('user'));
    }


       public function datatable()
    {
        $users = Auth::user();
       

        $data = Ptw_Assination::where('Ptw_Assinations.company_id', '=', $users->company_id)
            ->orderBy('Ptw_Assinations.id','DESC')
        ->get('Ptw_Assinations.*');

        return datatables()
            ->of($data)
            ->addIndexColumn()
          
            ->editColumn('action', function ($query) {
                return '<a href="' . route('ptw_assination.edit', $query['id']) . '" class=""><i class="fas fa-edit cursor-pointer"></i></a> | <a href="' . route('ptw_assination.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This department?\')"><i class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>';
            })
            
            ->make();
    }



    public function store(Request $request)
    {
      
        $input = new Ptw_Assination();
        $input->company_id = Auth::user()->company_id; 

        $input->PTW_Issuer = $request->input('PTW_Issuer');

        $input->Issuer_Phone = $request->input('Issuer_Phone');

        $input->PTW_Supervisor = $request->input('PTW_Supervisor');

        $input->Supervisor_Phone = $request->input('Supervisor_Phone');

        $input->Safety_Advisor = $request->input('Safety_Advisor');

        $input->Advisor_Phone = $request->input('Advisor_Phone');

        

        $input->save();
        session()->flash('message','Data has been saved successfully !!');
        return redirect()->back(); 


    } 


     public function edit($id)
    {

        $user = Auth::user();
        $data = Ptw_Assination::where('id', $id)->first();
        $PtwAssination = DB::selectOne("SELECT p.*FROM Ptw_assinations p
                             where p.id='$id'");

        return view('backend.PTWassination.edit',compact('user','data','PtwAssination'));

    }


    public function update(Request $request, $id)
    {
          $input = Ptw_Assination::find($id);

        $input->PTW_Issuer = $request->input('PTW_Issuer');

        $input->Issuer_Phone = $request->input('Issuer_Phone');

        $input->PTW_Supervisor = $request->input('PTW_Supervisor');

        $input->Supervisor_Phone = $request->input('Supervisor_Phone');

        $input->Safety_Advisor = $request->input('Safety_Advisor');

        $input->Advisor_Phone = $request->input('Advisor_Phone');

        

        $input->update();
        session()->flash('message','Data has been saved successfully !!');
        return redirect()->back(); 



    } 


      public function destroy($id)

    {

        $PtwAssination = Ptw_Assination::findOrFail($id);

       if ($PtwAssination)
         {
            $PtwAssination->delete();
            return redirect()->back()->with('success', 'Department information successfully deleted.');
        }

    }


}
