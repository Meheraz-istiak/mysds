<?php


namespace App\Http\Controllers\User\CompanySetup;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class EmployeeProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        return view('dashboards.user.companySetup.l_department', compact('user'));

    }





}
