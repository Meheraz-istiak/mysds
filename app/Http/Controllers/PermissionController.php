<?php

namespace App\Http\Controllers;

use App\Models\L_Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Permission $permission
     */
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index()
    {
        $permissions = Permission::all();
        $parentPermissions = Permission::whereNull('parent_id')->get();
//        dd($parentPermissions);
        return view('backend.permission.index', compact('permissions', 'parentPermissions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

//    public function getAllPermissions()
//    {
//        $permissions = $this->permission::all();
//        return response()->json([
//            'permissions'=>$permissions
//        ], 200);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function getAllPermissions()
    {
        $permissions = L_Permission::with('children')->get();
        $menus = L_Permission::with('children')->whereNull('parent_id')->get();
        return response()->json([
            'permissions'=>$permissions,
            'menus'=>$menus
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect()->route('permission.index')->with('success', 'Permission Created Successfully!!');
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
        $data['insertedData'] = $this->permission->where('id', $id)->first();
        return view('backend.permission.index', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }
    public function permissionUpdate(Request $request)
    {
//        dd($request);
        $id = $request->pid;
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name,'.$id
        ]);

        if (!$validator->passes())
        {
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else
        {
            $permission = Permission::find($id);
            $permission->name = $request->name;
            $permission->parent_id = $request->parent_id;
            $query = $permission->save();
            if ($query)
            {
                return response()->json(['code'=>1, 'msg'=>'Permission Updated Successfully!!']);
            }else
            {
                return response()->json(['code'=>0, 'msg'=>'Something Went Wrong!!']);
            }
        }
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

    public function datatable(Request $request)
    {
//        $data = $this->permission->all();
        $data = DB::select('SELECT
    a.id,
    a.name as name,
    b.name as parent_name,
    a.parent_id,
    a.created_at
FROM
    permissions a
LEFT JOIN permissions b ON
    a.parent_id = b.id
ORDER BY
    COALESCE(b.name, a.name),
    a.name');
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('parent_name', function ($data) {
                if ($data->parent_id !== null) {
                    return $data->parent_name;
                }else{
                    return '<span class="font-weight-bolder"><b>Parent Permission</b></span>';
                }
            })
            ->editColumn('created_at', function($data)
            {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)
                    ->format('d-m-Y');
                return $formatedDate;
            })
            ->editColumn('action',function ($d) {
                return  '<a href="#" data-id="'. $d->id .'"  class="edit-btn"><i class="fas fa-edit cursor-pointer"></i></a>';
            })
            ->escapeColumns('parent_name')
            ->make(true);
    }

    public function permissionDetails(Request $request, $id)
    {
        $id - $request->p_id;
        $pDetails = Permission::find($id);
        return response()->json([
            'permissionDetails'=>$pDetails
        ]);
    }
//' . route('permission.edit', ['id'=>$d->id]) . 'data-toggle="modal" data-target="#profileEditModal"
//->editColumn('active_yn',function ($d){
//    return $d->active_yn == 'Y' ? "Active" : "Deactive";
//})
}
