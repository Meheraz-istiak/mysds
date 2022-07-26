<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\create_inspection;
use Illuminate\Support\Facades\DB;
use App\Models\l_employee;
use App\Models\l_country;
use App\Models\Department;


class CreateIspectionController extends Controller
{

    private $create_inspection;


    public function __construct(create_inspection $create_inspection)
    {
        $this->create_inspection = $create_inspection;

    }


    public function index()
    {


        $count = DB::table('create_inspections')->count();

        $user = Auth::user();
        $emp = l_employee::where('company_id', '=', $user->company_id)->get();

        $department = Department::where('company_id', '=', $user->company_id)->get();
        $data = '';


        return view('backend.workplaceInspection.create_inspection', compact('user','data','emp','department','count'));



    }

    public function store(Request $request)
    {

//         dd($request);
        $this->validate($request, [
            'inspection_title' => 'required',
            'location' => 'required',
            'pic' => 'required',
            'unsafe' => 'required',
            'text' => 'required',
            'Justification' => 'required',
            'admitdate' => 'required',
            'targetdate' => 'required',
            'priority' => 'required',
        ]);
        $user = Auth::user();

        $input = new create_inspection;
        // dd($input);
        $input->company_id =$user->company_id;
        $input->inspection_title = $request->input('inspection_title');
        $input->location = $request->input('location');
        $input->pic = $request->input('pic');
        $input->unsafe = $request->input('unsafe');
        $input->text = $request->input('text');
        $input->Justification = $request->input('Justification');
        $input->admitdate = $request->input('admitdate');
        $input->targetdate = $request->input('targetdate');
        $input->priority = $request->input('priority');

        if ($image = $request->file('image')) {
            $destinationPath = 'image/workplace';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if ($input->save())
         {

            return redirect()->back()->with('success', 'Inspection successfully Saved.');
        }

    }

    public function datatable()
    {
        $inspection = create_inspection::with('country', 'employee')->where('company_id', '=', Auth::user()->company_id)->get();
//        dd($inspection);

        return datatables()->of($inspection)
//
            ->addColumn('priority', function ($query) {
                if ($query->priority == '0') {
                    return 'Urgent';
                } elseif ($query->priority == '1') {
                    return '1 or 2 Days';
                } else {
                    return '1 Week More';
                }
            })
            ->addColumn('image', function ($query) {
                $url = asset("image/workplace/$query->image");
                return '<img src=' . $url . ' border="0" width="40"  class="img-rounded" align="center" />';
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('create_ispection.edit', $query['id']) . '" class=""><i class="fas fa-edit cursor-pointer""></i></a> ||
                <a href="' . route('create_ispection.destroy', $query['id']) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This Item?\')"> <i class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>';
            })
            ->addIndexColumn()
            ->escapeColumns('image')
            ->make();

    }

    public function edit($id)
    {
        $user = Auth::user();
        $emp = l_employee::all();
        $department = Department::all();
        $data = create_inspection::where('id', $id)->first();

        return view('backend.workplaceInspection.create_inspection', compact('data', 'user', 'emp', 'department'));
    }


    public function update(Request $request, $id)
    {
        $input = create_inspection::find($id);
        $input->location = $request->input('location');
        $input->pic = $request->input('pic');
        $input->unsafe = $request->input('unsafe');
        $input->text = $request->input('text');
        $input->Justification = $request->input('Justification');
        $input->admitdate = $request->input('admitdate');
        $input->targetdate = $request->input('targetdate');
        $input->priority = $request->input('priority');

        if ($image = $request->file('image')) {
            $destinationPath = 'image/workplace';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $input->update();

        return redirect()->route('create_ispection.index')->with(['success' => 'Inspection is successfully Updated!']);

    }

    public function destroy(Request $request, $id)
    {
        $list = create_inspection::findOrFail($id);

        if ($list) {
            if (file_exists('image/workplace/' . $list->image) and !empty($list->image)) {
                unlink('image/workplace/' . $list->image);
            }
            $list->delete();
            return redirect()->back()->with('success', 'Inspection information successfully deleted.');
        }
    }


}
