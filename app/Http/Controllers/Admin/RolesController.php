<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Permission;
use App\Models\RoleHasPermissions;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Role::orderBy('created_at','DESC')->paginate(10);
        return view('admin.roles.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Role::create($request->all())){
            return redirect()->route('admin.roles.index')->with('sussess','Thêm role thành công!');
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
        $role = Role::find($id);
        return view('admin.roles.edit',compact('role'));
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
        $role = Role::find($id);
        if($role->update($request->all())){
            return redirect()->route('admin.roles.index')->with('success','Cập nhật role thành công');
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
        $role = Role::find($id);
        if($role->delete()){
            return redirect()->route('admin.roles.index')->with('success','Xóa role thành công');
        }
    }
    public function permissions($id)
    {
        $role = Role::find($id);
        $permissions = Permission::orderBy('created_at','ASC')->get();
        $roleHasPermissions = RoleHasPermissions::where('role_id','=',$id)
        ->get();
        return view('admin.roles.permissions',compact('permissions','role','roleHasPermissions'));
    }
    public function changePermissions(Request $request, $id)
    {
        $role = Role::find($id);
        $data = $request->all();
        if(isset($data['permission'])){
            $permissions = $data['permission'];
        }
        else{
            $permissions = [];
        }
        $role->syncPermissions($permissions);
        return redirect()->route('admin.roles.index')->with('status','Thêm vai trò cho user thành công');

    }
}
