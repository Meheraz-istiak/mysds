<?php


namespace App\Http\Controllers\BackEnd;


use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsercreateController extends Controller
{

    public function index(){

        $user = Auth::user();
        $company = CompanyProfile::all();
        return view('dashboards.admins.usercreate.index',compact('user','company'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
            'company'=>'required'
        ]);

        $input =new User();
        $input->name = $request->input('name');
        $input->email = $request->input('email');
        $input->role = $request->input('role');
        $input->password = Hash::make($request->input('password'));
        $input->company_id = $request->input('company');
        $input->save();

        return redirect()->back()->with(['success'=>'User is successfully created!']);

    }


}
