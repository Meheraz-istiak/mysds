<?php


namespace App\Http\Controllers\CompanySetup;


use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Department;
use App\Models\Designation;
use App\Models\l_country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\l_employee;
use function response;


class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $dep = Department::all();
        $des = Designation::get();
        $country = l_country::all();
        $data = DB::select('select e.*, des.ds_name,dep.depertment_name from l_employees e
LEFT JOIN designations des on (des.id = e.em_designation)
LEFT join departments dep on (dep.id = e.em_department) ORDER by e.id DESC;');
        $company = DB::selectOne("SELECT DISTINCT id, company_name from company_profile
where id = '$user->company_id'");


        return view('backend.employee.index', compact('user', 'dep', 'des', 'country', 'data', 'company'));

    }

    public function store(Request $request)
    {

        $input = new l_employee();
        $input->em_name = $request->input('em_name');
        $input->em_designation = $request->input('emp_des');
        $input->em_department = $request->input('em_department');
        $input->em_ic_passport_no = $request->input('em_ic_passport_no');
        $input->em_country = $request->input('country');
        $input->em_j_date = $request->input('em_j_date');
        $input->em_mail = $request->input('em_mail');
        $input->em_phone = $request->input('em_phone');
        $input->company_id = $request->input('company_name');
        $input->em_status = 'Y';
        if ($request->hasfile('em_photo')) {
            $file = $request->file('em_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/l_employees/', $filename);
            $input->em_profile = $filename;
        }
        if ($request->hasfile('em_signature')) {
            $file = $request->file('em_signature');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/emp_signature/', $filename);
            $input->em_signature = $filename;
        }

        $input->save();

        return redirect()->route('employee.index')->with(['success' => 'Form is successfully Updated!']);
    }

    public function getempinfo(Request $request)
    {
        $emp_id = $request->get('emp_id');


//    $datas = DB::selectOne("select e.*, des.ds_name,dep.depertment_name, c.country from l_employees e
//LEFT JOIN designations des on (des.id = e.em_designation)
//LEFT join departments dep on (dep.id = e.em_department)
//LEFT join l_country c on (c.id = e.em_country)
//WHERE e.id = '$emp_id'");

        $datas = DB::table('l_employees as e')
            ->leftJoin('designations as des', 'des.id', '=', 'e.em_designation')
            ->leftJoin('departments as dep', 'dep.id', '=', 'e.em_department')
            ->leftJoin('l_country as c', 'c.id', '=', 'e.em_country')
            ->leftJoin('company_profile as cm', 'cm.id', '=', 'e.company_id')
            ->select('e.*', 'des.ds_name', 'dep.depertment_name', 'c.country', 'cm.company_name')
            ->where('e.id', $emp_id)->first();

        $emp_id = $datas->id;
        $em_name = $datas->em_name;
        $des_id = $datas->em_designation;
        $des_name = $datas->ds_name;
        $dep_id = $datas->em_department;
        $dep_name = $datas->depertment_name;
        $em_ic_passport_no = $datas->em_ic_passport_no;
        $em_mail = $datas->em_mail;
        $em_phone = $datas->em_phone;
        $con_id = $datas->em_country;
        $con_name = $datas->country;
        $em_j_date = $datas->em_j_date;
        $em_profile = $datas->em_profile;
        $company_id = $datas->company_id;
        $company_name = $datas->company_name;
        $em_signature = $datas->em_signature;

        echo $emp_id . '||' . $em_name . '||' . $des_id . '||' . $des_name . '||' . $dep_id . '||' . $dep_name . '||' . $em_ic_passport_no . '||' . $em_mail . '||' . $em_phone . '||' . $con_id . '||' . $con_name . '||' . $em_j_date . '||' . $em_profile . '||' . $company_id . '||' . $company_name . '||' . $em_signature;

    }

    public function empUpdate(Request $request)
    {

        $id = $request->emp_id;

        $input = l_employee::find($id);

        $input->em_name = $request->input('em_name');
        $input->em_designation = $request->input('emp_des');
        $input->em_department = $request->input('em_department');
        $input->em_ic_passport_no = $request->input('em_ic_passport_no');
        $input->em_country = $request->input('country');
        $input->em_j_date = $request->input('em_j_date');
        $input->em_mail = $request->input('em_email');
        $input->em_phone = $request->input('em_phone_no');
        $input->company_id = $request->input('company_name');
        $input->em_status = 'Y';

        if ($request->hasfile('em_photo')) {
            $file = $request->file('em_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/l_employees/', $filename);
            $input->em_profile = $filename;
        } else {
            unset($input->em_profile);
        }
        if ($request->hasfile('em_signature')) {
            $file = $request->file('em_signature');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/emp_signature/', $filename);
            $input->em_signature = $filename;
        } else {
            unset($input->company_id);
        }
        $input->update();

        echo 'Successfully Updated';

    }


}
