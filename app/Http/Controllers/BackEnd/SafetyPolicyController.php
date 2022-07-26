<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\s_rule;
use App\Models\l_employee;
use App\Models\CompanyProfile;
use App\Models\designation;
use App\Models\uploadPolicy;
use Carbon\Carbon;
use DateTime;
use Session;
use Auth;
use PDF;
use DB;
use Storage;
use function dd;
use function response;


class SafetyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $user = Auth::user();

        $values=s_rule::orderby('id','desc')->get();
       $employees=l_employee::all();



    //    $em=$employees->em_name;
    //    $s_rule=DB::table('s_rules')
    //         ->leftJoin('l_employees', 'l_employees.id', '=', 's_rules.employee_id')
    //         ->where('jahid','=',$em)->first();
        return view('backend.safety.index',compact('user','employees','val','companies','companyname'));
    }

    public function policyindex()
    {
        $user = Auth::user();
        $employees=l_employee::all();
        $companies=DB::selectOne("SELECT c.company_name,c.id FROM company_profile c,users u WHERE u.company_id=c.id and  c.id='$user->company_id'");

        return view('backend.safety.g_policy',compact('user','employees','companies'));
    }

    public function dataGet()
    {
        $user = Auth::user();
        $employees=l_employee::all();
        $rule = s_rule::all();
        $companies=DB::selectOne("SELECT c.company_name,c.id FROM company_profile c,users u WHERE u.company_id=c.id and  c.id='$user->company_id'");

        return response()->json([
            'user'      => $user,
            'employees' => $employees,
            'companies' => $companies,
            'rule' => $rule,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'tagline'=>'required|string',
        ]);

        $input=new s_rule();
        // $input->title=$request->input('title');
        $input->commitment=$request->input('commitment');
        $input->tagline=$request->input('tagline');
        $input->employee_id=$request->input('employee_id');
        $input->designation_id=$request->input('designation_id');
        $input->company_id=$request->input('company_id');
        $input->save();
        Session::flash('success', 'Safety Policy successfully. Generated.!!');

        // session()->flash('msg','Accident Investigation has been saved successfully !!');
         return redirect()->route('safety.policy-view');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $safetys=s_rule::OrderBy('id','desc')->get();
        return view('backend.safety.s_view',compact('safetys','user'));
    }
    public function safetyview(Request $request)
    {
        $user = Auth::user();
        $data=DB::table('safety_committees')
        ->leftJoin('l_employees', 'l_employees.id', '=', 'safety_committees.employee_id')
        ->first();
        $safetys=s_rule::with('employee','designation','company')->OrderBy('id','desc')->latest()->first();

        // $safetys = DB::table('s_rules')
        //     ->leftJoin('l_employees', 'l_employees.id', '=', 's_rules.employee_id')
        //     ->get();

        $updata= uploadPolicy::orderBy('created_at','desc')->first();



        if(isset($safetys->created_at)){
            $created = new Carbon($safetys->created_at);
            $datetime = new DateTime($created);
            $newDateTime = $created->addYears(2);
            return view('backend.safety.safety_view',compact('safetys','user','data','newDateTime','updata'));
        }else{
            $newDateTime='';
            return view('backend.safety.safety_view',compact('safetys','user','data','newDateTime','updata'));
        }
        if(isset($updata->created_at)){
            $created1 = new Carbon($updata->created_at);
            $datetime1 = new DateTime($created1);
            $newDateTime1 = $created1->addYears(2);
            return view('backend.safety.safety_view',compact('safetys','user','data','newDateTime1','updata'));
        }else{
            $newDateTime1='';
            return view('backend.safety.safety_view',compact('safetys','user','data','newDateTime1','updata'));
        }


        return view('backend.safety.safety_view',compact('safetys','user','data','updata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modify($id)
    {
        $user = Auth::user();
        $data =s_rule::where('id',$id)->first();
        return view('backend.safety.s_view',compact('user','data'));
    }
    public function  modifystore(Request $request,$id){

        $input=s_rule::find($id);
        // $input->title=$request->input('title');
        $input->commitment=$request->input('commitment');
        $input->tagline=$request->input('tagline');
        $input->update();
        return redirect()->route('safety.safety-view');
    }



    public function download($id){

        $data=s_rule::where('id',$id)->first();
        $pdf = PDF::loadView('backend.safety.pdf',compact('data'));
         return $pdf->download('SafetyPolicyRules.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        s_rule::find($id)->delete();
        return back();
    }
    public function updestroy($id){
        uploadPolicy::find($id)->delete();
        return back();
    }



public function  getempdesignation($id)
{

$designation=DB::selectOne("SELECT d.id, d.ds_name from designations d
left join l_employees e on e.em_designation = d.id
where e.id =  '$id'");
return $designation;

}

    public function safetyTemplate(){
        $user = Auth::user();
        return view('backend.safety.safetytemplate',compact('user'));
    }
}
