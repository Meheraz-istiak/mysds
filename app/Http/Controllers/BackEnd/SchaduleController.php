<?php


namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ScheduleDemo;
use App\Models\CompanyProfile;


class SchaduleController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('web.home.schadule_demo',compact('user'));
    }

     public function store(Request $request)

    {
        // dd($request);

   


     
        
        $scheduleDemo = new ScheduleDemo();

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

        $scheduleDemo->save();


      

      
        $input = new CompanyProfile();

        $input->schedule_id = $scheduleDemo->id;

        $input->company_name = $request->input('company_name');

         // dd($input);
         
        $input->save();

        session()->flash('message','Data has been saved successfully !!');
         return redirect()->back(); 
        


    }
  
}
