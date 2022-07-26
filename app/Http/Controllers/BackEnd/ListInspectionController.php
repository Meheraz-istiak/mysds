<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\create_inspection;

class ListInspectionController extends Controller
{
    //

      public function index()
    {

        $user = Auth::user();


        return view('backend.workplaceInspection.list_inspection', compact('user'));

    }



}
