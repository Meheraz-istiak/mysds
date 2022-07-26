<?php


namespace App\Http\Controllers\BackEnd;


use App\Http\Controllers\Controller;

use App\Models\uploadPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\File;
use DB;

class UploadPolicyController extends Controller
{

    public function index(){

        $user = Auth::user();
        $companies=DB::selectOne("SELECT c.company_name,c.id FROM company_profile c,users u WHERE u.company_id=c.id and  c.id='$user->company_id'");

        return view('dashboards.admins.safety.uploadPolicy',compact('user','companies'));

    }

    public function store(Request $request){


        $input = new uploadPolicy();
      $input->company_id=$request->company_id;
        if ($policy_File = $request->file('policyFile')) {
            $destinationPath = 'policy/file';
            $file =$policy_File->getClientOriginalName();
            $policy_File->move($destinationPath, $file);
            $input['policy_File'] = "$file";
        }
        $input->insert_by = Auth::user()->id;
        $input->save();
        return redirect()->route('safety.policy-view');
        // return redirect()->route('safety.safety-view')->back()->with(['success'=>'File is successfully submitted!']);
    }
    // public function datatable()
    // {
    //     $updata= uploadPolicy::all();
    //     // $updata= uploadPolicy::orderBy('id', 'DESC')->get();
    // //    $data = uploadPolicy::with('company_id','policy_file')->OrderBy('id','desc')->latest()->first();

    //     return view('dashboards.admins.safety.safety_view',compact('data','updata'));
    // }


public function edit(Request $request, $id){

    $user = Auth::user();
    $data = uploadPolicy::where('id',$id)->first();

    return view('dashboards.admins.safety.uploadPolicy',compact('user','data'));

}

    public function update(Request $request, $id)
    {


        $input = uploadPolicy::find($id);
        $input->policy_name = $request->input('policyName');


        if ($policy_File = $request->file('policyFile')) {
            $destinationPath = 'policy/file';
            $file = $policy_File->getClientOriginalName();
            $policy_File->move($destinationPath, $file);
            $input['policy_File'] = "$file";


        }else{
            unset( $input['policy_File']);

        }

        $input->insert_by = Auth::user()->id;
        $input->update();


        return redirect()->route('upload_policy.index')->with(['success' => 'Policy is successfully Updated!']);

    }

    public function destroy($id)

    {

        $policy = uploadPolicy::findOrFail($id);

        if ($policy) {
            if (file_exists('policy/file/' . $policy->policy_file) and !empty($policy->policy_file)) {
                unlink('policy/file/' . $policy->policy_file);
            }
            $policy->delete();
            return redirect()->back()->with('success', 'Policy information successfully deleted.');
        }

    }


}
