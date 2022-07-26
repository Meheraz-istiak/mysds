<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SafetyCommittee;
use App\Models\g_committe;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;


class generateCommittee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $committes= SafetyCommittee::all();
        $user = Auth::user();
       $gc= g_committe::all();
       $companies=DB::selectOne("SELECT c.company_name,c.id FROM company_profile c,users u WHERE u.company_id=c.id and  c.id='$user->company_id'");
    //    $companies=CompanyProfile::all();
        return view('backend.safetycommittee.committe',compact('user','committes','gc','companies'));
    }

    public function employee(Request $request){



       $committes=DB::select("SELECT e.id,e.em_name FROM safety_committees s
          LEFT join l_employees e on e.id = s.employee_id
         WHERE  s.designation = '$request->designation'");

       $committes= DB::select("SELECT e.id as id,e.em_name as em_name FROM safety_committees s
LEFT join l_employees e on e.id = s.employee_id
WHERE  s.designation = '$request->designation'");


       $stringTosend = '';
       if(!empty($committes)){
           $stringTosend .= ' <option value="">--- Choose ---</option>';
           foreach($committes as $committe){

            $stringTosend .="<option value='".$committe->em_name."'>".$committe->em_name."</option>";
        }
        echo   $stringTosend;
       }else{

        echo ' <option value="">--- Choose ---</option>';
       }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * public function

     */

     public function committeestore(Request $request){

     }


    public function generatepdf(Request $request){

        $data=[
            'designation_name' => $request->designation_id,
            'employee_id' => $request->employee_id,
            'company_name' => $request->company_name,
            'em_name'=>$request->employee_id,
        ];

         $pdf = PDF::loadView('backend.safetycommittee.pdf',$data);
         return $pdf->download('Committe.pdf');
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        g_committe::find($id)->delete();
        return back();
    }
}
