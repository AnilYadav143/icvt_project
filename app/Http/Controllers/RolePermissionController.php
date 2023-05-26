<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('admin.role',compact('roles'));
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
        // dd($request);
        $request->validate([
            'rolename' => 'required',
        ]);
        $res = Role::create([
            'name'=>$request->rolename,
        ]);
        if($res){
            Alert::success('Great', 'Role Successfully added');
        }else{
            Alert::success('Error', 'Role not added');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $single_data  =   Role::find($id);
        $roles   =   Role::get();
        return view('admin.role',compact('roles','single_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $save_res   =   Role::where('id', $id)->update([
            'name'  =>$request->rolename,
        ]);

        if($save_res){
            Alert::alert('Great', 'Role updated successfully');
            return redirect()->back();
        }else{
            Alert::alert('Error', 'Role Not Update');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Role::find($id)->delete();
        if($data){  
         Alert::alert('Great', 'Role Deleted successfully');
             return redirect()->back();  
        }else{
         Alert::alert('Error', 'Role not Deleted');
             return redirect()->back();  
        }
    }
}
