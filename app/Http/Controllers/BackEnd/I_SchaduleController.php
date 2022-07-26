<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\I_schadule;
use App\Models\ScheduleDemo;
use App\Models\CompanyProfile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class I_SchaduleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $Schedule=ScheduleDemo::all();

         

         return view('backend.schadule.schadule', compact('user','Schedule'));
    }

     public function edit($id)
    {
         $user = Auth::user();            
    
         
         
         $data = ScheduleDemo::where('id', $id)->first();
         // dd($data);
         $Schedule=ScheduleDemo::all();

         $company=CompanyProfile::all();

         $data1 = DB::selectOne("SELECT c.company_name1,s.* from company_profile c
                            left join schedule_demos s on s.id = c.schedule_id 

                            where s.id = '$id'");
         
        
         return view('backend.schadule.edit', compact('user','data1','data','Schedule','company'));
    }


   public function update(Request $request, $id)
    {

        $scheduleDemo=ScheduleDemo::find($id);

        // $scheduleDemo->company_name = $request->input('company_name'); 

        $scheduleDemo->industry_type_id = $request->input('industry_type_id');

        $scheduleDemo->number_of_employees = $request->input('number_of_employees');

        $scheduleDemo->email_address = $request->input('email_address');

        $scheduleDemo->person_incharge = $request->input('person_incharge');

        $scheduleDemo->designation = $request->input('designation');

        $scheduleDemo->contact_no = $request->input('contact_no');

        $scheduleDemo->meeting_date = $request->input('meeting_date');

        $scheduleDemo->meeting_time = $request->input('meeting_time');

        $scheduleDemo->status = $request->input('status');

        $scheduleDemo->update();


      

        
        
        $input = CompanyProfile::where('schedule_id',$id)->first();

        $input->schedule_id = $request->id;

        $input->company_name1 = $request->input('company_name');

         // dd($input);
         
        $input->update();

        session()->flash('message','Data has been saved successfully !!');
         return redirect()->back(); 


    }
}
