<?php

namespace App\Http\Controllers;

use App\Models\PermissionName;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class AssignPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('admin.assign_permission',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fetchrole'=>'required',
        ]);
        // dd($request);
        $selectrole=Role::find($request->fetchrole);
        $roles=Role::all();
        $permissionnames=PermissionName::all();
        return view('admin.assign_permission',compact('roles','permissionnames','selectrole'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'roleid'=>'required',
            'rolepermissions'=>'required'
        ]);

        $role=Role::find($request->roleid);
        $role->syncPermissions($request->rolepermissions);
        Alert::success('Great', 'Permission Assigned Successfully');
        return redirect()->route('assignpermission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
