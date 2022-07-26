<?php

namespace App\Http\Controllers;

use App\Models\ScheduleDemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function compact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $Schedule=ScheduleDemo::all();
        return view('backend.home', compact('user','Schedule'));
    }
}
