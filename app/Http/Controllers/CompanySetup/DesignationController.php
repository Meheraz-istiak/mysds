<?php


namespace App\Http\Controllers\CompanySetup;


use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Designation;


class DesignationController extends Controller
{
    public function index(){
        $user = Auth::user();
//        $dept=Department::all();
        return view('backend.designation.index', compact('user'));
    }

    public function store(Request $request){

        $request->validate([
            'ds_name' => 'required',
            'ds_rank' => 'required',

        ]);
        $input =new Designation();
        $input->ds_name = $request->input('ds_name');
        $input->ds_rank = $request->input('ds_rank');
        $input->ds_status= 'Y';
        $input->company_id = Auth::user()->company_id;
        $input->insert_by = Auth::user()->id;
//dd($input);
        $input->save();

        return redirect()->route('designation.index')->with(['success'=>'Form is successfully submitted!']);
    }

    public function designationedit($id){

        $user = Auth::user();
        $designations =Designation::all();
        $data = Designation::where('id',$id)->first();
         return view('backend.designation.index',compact('user','designations','data'));
    }

    public function  editstore(Request $request,$id){

        $request->validate([
            'ds_name' => 'required',
            'ds_rank' => 'required',

        ]);

        $input = Designation::find($id);
        $input->ds_name = $request->input('ds_name');
        $input->ds_rank = $request->input('ds_rank');
        $input->ds_status= 'Y';
        $input->company_id = Auth::user()->company_id;
        $input->insert_by = Auth::user()->id;
        $input -> update();
        return redirect()->route('designation.index')->with(['success'=>'Form is successfully Updated!']);

//        return redirct('dashboards.users.companySetup.l_designation');
    }


    public function datatable()
    {
        $users = Auth::user();

        $data = Designation::where('designations.company_id', '=', $users->company_id)
            ->orderBy('designations.id','DESC')
            ->get('designations.*');


        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('status', function ($query) {
                if($query->ds_status == '1'){
                    return 'Active';
                }else{
                    return 'In-Active';
                }
            })
            ->editColumn('action',function ($query) {
                return  '<a href="' . route('designation.designation-edit', $query['id']) . '" class=""><i class="fas fa-edit"></i></a> || <a href="' . route('designation.destroy', $query['id']) . '" class="btn btn-danger" onclick="return confirm(\'Are You Sure You Want To Delete This Designation?\')"> <i class="fas fa-trash cursor-pointer" ></i></a>';
            }
            )->make();
    }
    public function destroy(Request $request, $id){
        DB::delete('delete from designations where id = ?',[$id]);
        return redirect()->route('designation.index')->with(['success'=>'Form is successfully Deleted!']);

    }
}
