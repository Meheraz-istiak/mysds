<?php


namespace App\Http\Controllers\CompanySetup;


use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\l_country;
use App\Models\L_state;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CompanyProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        $country = l_country::all();
        $data['countries'] = l_country::get(["country","id"]);
        return view('backend.company.index', compact('user','country', 'data'));

    }

    public function getAllCompany(Request $request)
    {
        $company = CompanyProfile::all();
        return response()->json(['company' => $company], 200);
    }

    public function getState(Request $request)
    {
        $data['states'] = L_state::where("country_id",$request->country_id)
            ->get(["name","id"]);
        return response()->json($data);
    }

    public function store(Request $request){
        $request->validate([
            // 'user_name' => 'required',
            'password' => 'required',
            'company_name' => 'required',
            'contact_person' => 'required',
            'mobile_number' => 'required|numeric',
            'email' => 'required|email|unique:company_profile,email',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        $input =new CompanyProfile();
        $input->user_name = $request->input('user_name');
        $input->password = md5($request->input('password'));
        $input->company_name = $request->input('company_name');
        $input->contact_person = $request->input('contact_person');
        $input->mobile_number = $request->input('mobile_number');
        $input->address = $request->input('address');
        $input->email = $request->input('email');
        $input->country = $request->input('country');
        $input->state = $request->input('state');
        $input->city = $request->input('city');
        $input->web_url = $request->input('web_url');
        $input->postal_code = $request->input('postal_code');
        $input->save();

        return redirect()->back()->with('success', 'Company Profile Successfully Updated!!');

    }





}
