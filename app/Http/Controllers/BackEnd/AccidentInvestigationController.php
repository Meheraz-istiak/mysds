<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\IdentifyInjuredPart;
use App\Models\WhyAnalysis;
use App\Models\AcciAnnalysis;
use App\Models\WhyIncidentHappen;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function compact;
use function dd;
use function md5;
use function redirect;
use DB;
class AccidentInvestigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {

        $user = Auth::user();
        $data=AcciAnnalysis::where('company_id', '=', $user->company_id)->get();

        $req=$request->inc_number;
        $s_data=DB::table('acci_annalyses')
            ->leftJoin('departments','departments.id','=','acci_annalyses.em_dept')
            ->leftJoin('l_employees','l_employees.id','=','acci_annalyses.em_name')
            ->where('inc_number','=',$req)->get();

        return view('backend.accidentInvestigation.index', compact('user','data','s_data'));
    }


    public function whyWizerd()
    {
        $user = Auth::user();
        return view('backend.accidentInvestigation.why_wizerd', compact('user'));
    }
    public function whyIncidentHappen()
    {
        $user = Auth::user();
        return view('backend.accidentInvestigation.why_incident_happen', compact('user'));
    }
    public function identifyInjuredPart()
    {
        $user = Auth::user();
        return view('backend.accidentInvestigation.identify_injured_part', compact('user'));
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
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {

        $request->validate([
            'why1' => 'required',
            'why2' => 'required',
            'why3' => 'required',
            'why4' => 'required',
            'why5' => 'required',
            'rootCause' => 'required',
            'reOccurrence' => 'required'
        ]);

        $input = new WhyAnalysis();
        $input->inc_number = $request->input('inc_number');
        $input->why1 = $request->input('why1');
        $input->why2 = $request->input('why2');
        $input->why3 = $request->input('why3');
        $input->why4 = $request->input('why4');
        $input->why5 = $request->input('why5');
        $input->rootCause = $request->input('rootCause');
        $input->reOccurrence = $request->input('reOccurrence');
        $input->company_id = Auth::user()->company_id;
        // dd($request);
        $input->save();


        return redirect()->route('accident_report.why_incident_happen', ['id'=>$request->inc_number])->with('success', 'WHY Analysis Successfully Inserted!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    }

    public function whyIncidentHappenStore(Request $request)
    {

        $inc_number=$request->inc_number;
        $input = new WhyIncidentHappen();
        $input->inc_number=$inc_number;
        $input->in_guard = $request->input('in_guard');
        $input->operating_permission = $request->input('operating_permission');
        $input->hazard = $request->input('hazard');
        $input->techniques = $request->input('techniques');
        $input->device_defective = $request->input('device_defective');
        $input->swp = $request->input('swp');
        $input->equipment_defective = $request->input('equipment_defective');
        $input->device_inoperative = $request->input('device_inoperative');
        $input->layout_hazardous = $request->input('layout_hazardous');
        $input->defective_equipment = $request->input('defective_equipment');
        $input->unsafe_lighting = $request->input('unsafe_lighting');
        $input->unapproved_way = $request->input('unapproved_way');
        $input->unsafe_ventilation = $request->input('unsafe_ventilation');
        $input->lifting_hand = $request->input('lifting_hand');
        $input->protective_equipment = $request->input('protective_equipment');
        $input->wrong_posture = $request->input('wrong_posture');
        $input->appropriate_equipment = $request->input('appropriate_equipment');
        $input->horseplay = $request->input('horseplay');
        $input->chemical_handling = $request->input('chemical_handling');
        $input->insufficient_training = $request->input('insufficient_training');
        $input->available_equipment = $request->input('available_equipment');
        $input->others1 = $request->input('others1');
        $input->others2 = $request->input('others2');
        $input->unsafe_conditions = $request->input('unsafe_conditions');
        $input->unsafe_acts = $request->input('unsafe_acts');
        $input->prior_incident = $request->input('prior_incident');
        $input->similar_incidents = $request->input('similar_incidents');

        $input->save();



        return redirect()->route('accident_report.identify_injured_part' , ['id'=>$request->inc_number])->with('success', 'Incident Happen Successfully Inserted!!');
    }

    public function identifyInjuredPartStore(Request $request)
    {
        $input = new IdentifyInjuredPart();
        $input->inc_number = $request->input('inc_number');
        $input->head = $request->input('head');
        $input->right_toe = $request->input('right_toe');
        $input->burn = $request->input('burn');
        $input->sprain = $request->input('sprain');
        $input->left_toe = $request->input('left_toe');
        $input->right_eye = $request->input('right_eye');
        $input->neck = $request->input('neck');
        $input->bruise = $request->input('bruise');
        $input->fracture = $request->input('fracture');
        $input->left_eye = $request->input('left_eye');
        $input->right_ear = $request->input('right_ear');
        $input->back = $request->input('back');
        $input->concussion = $request->input('concussion');
        $input->foreign_body = $request->input('foreign_body');
        $input->left_ear = $request->input('left_ear');
        $input->right_arm = $request->input('right_arm');
        $input->right_chest = $request->input('right_chest');
        $input->laceration = $request->input('laceration');
        $input->amputation = $request->input('amputation');
        $input->left_arm = $request->input('left_arm');
        $input->left_chest = $request->input('left_chest');
        $input->right_hand = $request->input('right_hand');
        $input->internal = $request->input('internal');
        $input->crush = $request->input('crush');
        $input->rash = $request->input('rash');
        $input->left_hand = $request->input('left_hand');
        $input->right_hand_finger = $request->input('right_hand_finger');
        $input->abdomen = $request->input('abdomen');
        $input->eclectic_shock = $request->input('eclectic_shock');
        $input->inhalation = $request->input('inhalation');
        $input->left_hand_finger = $request->input('left_hand_finger');
        $input->right_leg = $request->input('right_leg');
        $input->right_groin = $request->input('right_groin');
        $input->hernia = $request->input('hernia');
        $input->abrasion = $request->input('abrasion');
        $input->left_leg = $request->input('left_leg');
        $input->left_groin = $request->input('left_groin');
        $input->right_knee = $request->input('right_knee');
        $input->right_shoulder = $request->input('right_shoulder');
        $input->tendinitis = $request->input('tendinitis');
        $input->left_knee = $request->input('left_knee');
        $input->left_shoulder = $request->input('left_shoulder');
        $input->right_foot = $request->input('right_foot');
        $input->left_shoulder = $request->input('left_shoulder');
        $input->right_foot = $request->input('right_foot');
        $input->right_ankle = $request->input('right_ankle');
        $input->strain = $request->input('strain');
        $input->left_foot = $request->input('left_foot');
        $input->left_ankle = $request->input('left_ankle');
        $input->hip = $request->input('hip');
        $input->others1 = $request->input('others1');
        $input->others2 = $request->input('others2');
        $input->save();

        return redirect()->route('accident_report.index')->with('success', 'Injured Body Part Successfully Inserted!!');
    }

    public function report(Request $request) {

        $user=Auth::user();
        $req=$request->inc_number;
        $data=AcciAnnalysis::all();

       $s_data=DB::table('acci_annalyses')->leftJoin('departments','departments.id','=','acci_annalyses.em_dept')->leftJoin('l_employees','l_employees.id','=','acci_annalyses.em_name')->where('inc_number','=',$req)->get();


        return view('backend.accidentInvestigation.index', compact('user','data','s_data'));
    }

}
