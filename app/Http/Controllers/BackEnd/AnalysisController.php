<?php


namespace App\Http\Controllers\BackEnd;


use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AcciAnnalysis;
use App\Models\McAnnalysis;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class AnalysisController extends Controller
{

    public function accident(){

        $user = Auth::user();
        $dep = Department::where('company_id', '=', $user->company_id)->get();

        $des = Designation::where('company_id', '=', $user->company_id)->get();

        return view('backend.accidentInvestigation.accidentAnalysis',compact('user','dep','des'));

    }

    public function getempName(Request $request, $id)
    {

        $employee= DB::select("select e.id as id,e.em_name as name from l_employees e
         WHERE e.em_department = '$id'");

        $values= '';
        if(!empty($employee)){
            $values .= ' <option value="">--- Choose ---</option>';
            foreach($employee as $data){

                $values .="<option value='".$data->id."'>".$data->name."</option>";
            }
            echo   $values;
        }else{

            echo ' <option value="">--- Choose ---</option>';
        }
    }


    public function getdesignation(Request $request, $id)
    {

        $designation= DB::select("select d.id as id,d.ds_name as department from designations d left join l_employees e on e.em_designation = d.id
        where e.id = '$id'");

        return $designation;
    }

    public function store(Request $request)
    {
        //  dd($request->input('st_of_invesg'));die;

        $incnumber=Helper::IDGenerator(new AcciAnnalysis,'inc_number',5,'INC');

        $input = new AcciAnnalysis();
        $input->inc_number=$incnumber;
        $input->em_dept  = $request->input('em_dept');
        $input->em_name  = $request->input('em_name');
        $input->em_des = $request->input('em_des');
        $input->l_of_incident = $request->input('l_of_incident');
        $input->t_of_accident = $request->input('t_of_accident');
        $input->tim_of_incident = $request->input('tim_of_incident');
        $input->rpt_to_dosh = $request->input('rpt_to_dosh');
        $input->st_of_invesg = $request->input('st_of_invesg');
        $input->outcom_of_investg = $request->input('outcom_of_investg');
        $input->summ_of_incident = $request->input('summ_of_incident');
        $input->company_id = Auth::user()->company_id;
        $input->save();

        // count array value

        $count = $request->start_dateMC;
        foreach($count as $main=>$row)
        {
            $inputMC = new McAnnalysis();
            $inputMC->acci_annalyses_id = $input->id;
            $inputMC->s_date = $request->start_dateMC[$main];
            $inputMC->e_date = $request->end_dateMC[$main];
            $inputMC->total_duration = $request->total_duration[$main];
            $inputMC->typ_of_notif = $request->typ_of_notif[$main];
            $inputMC->typ_of_record = $request->typ_of_record[$main];
            $inputMC->save();
        }
        session()->flash('message','Accident Investigation has been saved successfully!!');
        return redirect()->back();
    }

    public function list_acci()
    {
        $user = Auth::user();
        $data = DB::select("SELECT  a.id as id,a.em_dept,a.em_name,a.em_des,a.l_of_incident,a.t_of_accident,a.tim_of_incident,a.rpt_to_dosh,a.st_of_invesg,a.outcom_of_investg,a.summ_of_incident,d.depertment_name,
        b.s_date,b.e_date,b.total_duration,b.typ_of_notif,b.typ_of_record,
        d.depertment_name,e.em_name,de.ds_name FROM acci_annalyses a
        LEFT join mc_annalyses b on b.acci_annalyses_id = a.id
        left join departments d on d.id = a.em_dept
        left join l_employees e on e.id =a.em_name
        LEFT JOIN designations de on de.id =a.em_des
        where a.company_id = $user->company_id");
        return view('backend.accidentInvestigation.list_accident',compact('user', 'data'));
    }

}
