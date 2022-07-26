<?php


namespace App\Http\Controllers\SWP;
use App\Http\Controllers\Controller;
use App\Models\l_ppe;
use App\Models\s_work_procedure;
use App\Models\Department;
use App\Models\safeworkppe;
use Auth;
use DB;
use Illuminate\Http\Request;


class SafeWorkProcedureController extends Controller
{
    public function index(Request $request){
        $user=Auth::user();
        $ppe = l_ppe::all();
        $data1=Department::all();
       $values=s_work_procedure::orderby('id','desc')->get();
       $companies=DB::selectOne("SELECT c.company_name,c.id FROM company_profile c,users u WHERE u.company_id=c.id and  c.id='$user->company_id'");
       return view('backend.SafeWorkProcedure.index',compact('user','ppe','values','data1','companies'));
    }
    public function store(Request $request){

        $request->validate([
            'work_title' => 'required',
            'before_work' => 'required',
            'during_work' => 'required',
            'after_work' => 'required',
            'potential_hazard' => 'required',
            'ppe_name' => 'required',
            'remarks' => 'required',
        ]);
         $input = new s_work_procedure();
         $input->company_id= Auth::user()->company_id;
         $input->dep_id=$request->input('dep_id');
        $input->work_title = $request->input('work_title');
        $input->before_work_rules = $request->input('before_work');
        $input->during_work_rules = $request->input('during_work');
        $input->after_work_rules = $request->input('after_work');
        $input->potential_hazard = $request->input('potential_hazard');
        $input->remarks = $request->input('remarks');
        if ($before_work_image = $request->file('before_work_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/beforeWork';
            $beforeWorkImage = date('YmdHis') . "." . $before_work_image->getClientOriginalExtension();
            $before_work_image->move($destinationPath, $beforeWorkImage);
            $input['before_work_image'] = "$beforeWorkImage";
        }
        if ($during_work_image = $request->file('during_work_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/duringWork';
            $duringImage = date('YmdHis') . "." . $during_work_image->getClientOriginalExtension();
            $during_work_image->move($destinationPath, $duringImage);
            $input['during_work_image'] = "$duringImage";
        }
        if ($after_work_image = $request->file('after_work_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/afterWork';
            $afterImage = date('YmdHis') . "." . $after_work_image->getClientOriginalExtension();
            $after_work_image->move($destinationPath, $afterImage);
            $input['after_work_image'] = "$afterImage";
        }
        if ($potential_hazard_image = $request->file('potential_hazard_image')) {
            $destinationPath = 'image/SafetyWorkProcedure/potentialHazard';
            $potentialImage = date('YmdHis') . "." . $potential_hazard_image->getClientOriginalExtension();
            $potential_hazard_image->move($destinationPath, $potentialImage);
            $input['potential_hazard_image'] = "$potentialImage";
        }
      
        $input->save();
        $count = $request->ppe_name;
        foreach($count as $main=>$row)
      {
         $input1 = new  safeworkppe();
         $input1->swork_id =  $input->id;
         $input1->ppe_name= $request->ppe_name[$main];
         $input1->save(); 
          }    
        return back()->with("success","Data Added Successfully");
    }
    public function swpView($id){

        $user=Auth::user();
       $values=DB::table('s_work_procedures as s')
       ->leftjoin('departments  as d', 's.dep_id','=','d.id')
       ->leftjoin('company_profile as c', 'c.id', '=', 's.company_id')
       ->where('s.id','=',$id)
       ->select('s.*','d.depertment_name','c.company_name')
       ->first();
       
      // dd($values);
       $pp_data=safeworkppe::where('swork_id',$id)->get();

        return view('backend.SafeWorkProcedure.swpdetails',compact('values','user','pp_data'));
    }
    public function edit($id){
        $user=Auth::user();
        $ppe = l_ppe::all();
        $values= s_work_procedure::all();
        $data= s_work_procedure::where('id',$id)->first();
        $c_data=safeworkppe::where('swork_id',$id)->get();
        $data1=Department::all();
        $companies=DB::selectOne("SELECT c.company_name,c.id FROM company_profile c,users u WHERE u.company_id=c.id and  c.id='$user->company_id'");
        return view('backend.SafeWorkProcedure.index',compact('user','data','ppe','values','data1','c_data','companies'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'work_title' => 'required',
            'before_work' => 'required',
            'during_work' => 'required',
            'after_work' => 'required',
            'potential_hazard' => 'required',
            'ppe_name' => 'required',
            'remarks' => 'required',
        ]);
         $input = s_work_procedure::find($id);
         $input->company_name=$request->input('company_name');
         $input->dep_id=$request->input('dep_id');
         $input->work_title = $request->input('work_title');
         $input->before_work_rules = $request->input('before_work');
         $input->during_work_rules = $request->input('during_work');
         $input->after_work_rules = $request->input('after_work');
         $input->potential_hazard = $request->input('potential_hazard');
         $input->remarks = $request->input('remarks');
         if ($before_work_image = $request->file('before_work_image')) {
             $destinationPath = 'image/SafetyWorkProcedure/beforeWork';
             $beforeWorkImage = date('YmdHis') . "." . $before_work_image->getClientOriginalExtension();
             $before_work_image->move($destinationPath, $beforeWorkImage);
             $input['before_work_image'] = "$beforeWorkImage";
         }
         if ($during_work_image = $request->file('during_work_image')) {
             $destinationPath = 'image/SafetyWorkProcedure/duringWork';
             $duringImage = date('YmdHis') . "." . $during_work_image->getClientOriginalExtension();
             $during_work_image->move($destinationPath, $duringImage);
             $input['during_work_image'] = "$duringImage";
         }
         if ($after_work_image = $request->file('after_work_image')) {
             $destinationPath = 'image/SafetyWorkProcedure/afterWork';
             $afterImage = date('YmdHis') . "." . $after_work_image->getClientOriginalExtension();
             $after_work_image->move($destinationPath, $afterImage);
             $input['after_work_image'] = "$afterImage";
         }
         if ($potential_hazard_image = $request->file('potential_hazard_image')) {
             $destinationPath = 'image/SafetyWorkProcedure/potentialHazard';
             $potentialImage = date('YmdHis') . "." . $potential_hazard_image->getClientOriginalExtension();
             $potential_hazard_image->move($destinationPath, $potentialImage);
             $input['potential_hazard_image'] = "$potentialImage";

         }
       
         $input->update();
         $count = $request->ppe_name;
         foreach($count as $main=>$row)
       {
          $input1 = safeworkppe::where('swork_id',$id)->first();
          $input1->swork_id =  $input->id;
          $input1->ppe= $request->ppe_name[$main];
          $input1->update();
           }
        return view('safe_work_procedure.index')->with("success","Data Updated Successfully");
    }
    public function destroy(Request $request){
        $data=s_work_procedure::find($request->id);
        unlink('image/SafetyWorkProcedure/beforeWork/'.$data->before_work_image);
        unlink('image/SafetyWorkProcedure/duringWork/'.$data->during_work_image);
        unlink('image/SafetyWorkProcedure/afterWork/'.$data->after_work_image);
        unlink('image/SafetyWorkProcedure/potentialHazard/'.$data->potential_hazard_image);
        s_work_procedure::where('id',$data->id)->delete();
        DB::table("safeworkppes")->where("swork_id",$request->id)->delete();
        return back();  
    }

}
