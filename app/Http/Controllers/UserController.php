<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function dd;
use function response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $users = User::latest()->get();
        $users->transform(function($user){
            $user->role = $user->getRoleNames()->first();
            $user->userPermissions = $user->getPermissionNames();
            return $user;
        });

        return response()->json([
            'users' => $users
        ], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $user = Auth::user();
        return view('user.login', compact('user'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required',
            'company_id' => 'required',
            'password' => 'required|alpha_num|min:6',
            'role' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company_id = $request->company_id;
        $user->password = bcrypt($request->password);

        $user->assignRole($request->role);

        if($request->has('permissions')){
            $user->givePermissionTo($request->permissions);
        }

        $user->save();

        return response()->json("User Created", 200);
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
            'phone' => 'required',
            'company_id' => 'required',
            'password' => 'nullable|alpha_num|min:6',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->company_id = $request->company_id;
        $user->email = $request->email;

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }


        if($request->has('role')){
            $userRole = $user->getRoleNames();
            foreach($userRole as $role){
                $user->removeRole($role);
            }

            $user->assignRole($request->role);
        }

        if($request->has('permissions')){
            $userPermissions = $user->getPermissionNames();
            foreach($userPermissions as $permssion){
                $user->revokePermissionTo($permssion);
            }

            $user->givePermissionTo($request->permissions);
        }

        $user->save();

        return response()->json('ok',200);
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

    public function delete($id){
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json('ok', 200);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('backend.profile.index', compact('user'));
    }

    public function profileUpdate()
    {
        $user = Auth::user();
        return response()->json(['user'=>$user], 200);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required',
        ]);

        $user = User::find($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->update();

        return redirect()->back()->with('success', 'Profile Successfully Updated');
    }
}
