<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Demo;

use function dd;

class DemoController extends Controller
{

  public function index ()
  {  
     $user = Auth::user();
     $demo=Demo::all();
     return view('backend.demo.demo', compact('user','demo'));
  }

  public function store(Request $request)

  {
    $name = $request->post('name');
    $phone = $request->post('phone');
    $email = $request->post('name');
    $password = $request->post('password');

    $image_name=array();
    $imageArr = $request->file('image');
    $count=0;

    foreach($imageArr as $image){

      $image_name[]=$image->getClientOriginalName();
      $image->storeAs('public/demo_image/',$image_name[$count]);
      $count++;
    }
    
    DB::table('demos')->insert(array([
     'name'=>$name,
     'phone'=>$phone,
     'email'=>$email,
     'password'=>$password,
     'image'=> implode(',', $image_name),


    ]));

      $msg = " data insart";
      return $msg;

   }


}
