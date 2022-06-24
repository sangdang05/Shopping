<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $permission = Permission::create(['name' => 'delete-permissions']);
        $data = User::orderBy('updated_at','DESC')->paginate(10);
        return view('admin.user.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = bcrypt($request->password);
        $request->merge(['password'=>$password]);
        if(User::create($request->all())){
            return redirect()->route('admin.user.index')->with('success','Thêm user thành công');
        }

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
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
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
        $user = User::find($id);
        $password = bcrypt($request->password);
        $request->merge(['password'=>$password]);
        if($user->update($request->all())){
            return redirect()->route('admin.user.index');
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }

    public function role($id)
    {
        $user = User::findOrFail($id);
        $all_roles = $user->roles->first();
        $role = Role::orderBy('created_at','DESC')->get();
        return view('admin.user.role',compact('user','role','all_roles'));
    }
    public function changeRole(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);
        $user->syncRoles($data['role']);
        return redirect()->route('admin.user.index')->with('status','Thêm vai trò cho user thành công');
    }
}

