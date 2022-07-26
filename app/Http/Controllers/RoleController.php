<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * @var Role
     */
    private $role;

    /**
     * Display a listing of the resource.
     *
     * @param Role $role
     */

    public function __construct(Role $role)
    {
        $this->middleware('auth');
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $roles = $this->role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllRoles()
    {
        $roles = Role::latest()->get();
        $permission_data = DB::select('SELECT
    a.id,
    a.name as name,
    CASE WHEN a.parent_id IS NULL
       THEN a.name
END AS parent_name,
    CASE WHEN a.parent_id IS NOT NULL
       THEN a.name
       ELSE null
END AS child_name,
    a.parent_id,
    a.created_at
FROM
    permissions a
LEFT JOIN permissions b ON
    a.parent_id = b.id
ORDER BY
    COALESCE(b.name, a.name),
    a.name DESC');
        $roles->transform(function ($role)
        {
           $role->rolePermission = $role->getPermissionNames();
           return $role;
        });

        return response()->json([
            'roles'=>$roles,
            'permission_data'=>$permission_data,
        ]);
    }


    public function datatable(Request $request)
    {
        $data = $this->role->all();
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->editColumn('permissions', function($data)
            {
                $html = '';
                foreach ($data->permissions as $permission){
                    $html = '<button class="btn btn-warning" role="button">
                             <i class="fas fa-shield-alt"></i> '. $permission->name .' </button>';
                }
                return $html;
            })
            ->editColumn('created_at', function($data)
            {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)
                    ->format('d-m-Y');
                return $formatedDate;
            })
            ->editColumn('action',function ($d) {
                return  '<a href="#" data-id="'. $d['id'] .'"  class="edit-btn"><i class="fas fa-edit cursor-pointer"></i></a>';
            })
            ->escapeColumns('permissions')
            ->make(true);
    }

    public function roleDetails(Request $request, $id)
    {
        $id - $request->p_id;
        $roleDetails = Role::find($id);
        $rolePermissions = $roleDetails->permissions;
        return response()->json([
            'roleDetails'=>$roleDetails,
            'rolePermissions'=>$rolePermissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'name' => 'required|string|unique:roles',
            'permissions' => 'nullable',
        ]);

        $role = $this->role->create([
            'name'=> $request->name
        ]);
        if ($request->has("permissions")) {
            $role->givePermissionTo($request->permissions);
        }
        return response()->json('Role Created', 200);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'permissions' => 'nullable',
        ]);

        $role = Role::findOrFail($id);

        $role->name = $request->name;

        if ($request->has("permissions")) {
            $rolePermissions = $role->getPermissionNames();
            foreach($rolePermissions as $permission){
                $role->revokePermissionTo($permission);
            }
            $role->givePermissionTo($request->permissions);
        }

        $role->save();

        return response()->json('Role Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return response()->json('ok', 200);
    }
}
