<?php

namespace App\Http\Controllers;

use App\Models\PermissionName;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = PermissionName::get();
        return view('admin.permission',compact('permissions'));
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
            'permission_name' => 'required',
        ]);
            $res = PermissionName::create([
                'name'=>$request->permission_name,
            ]);
            Permission::create([
                'name'=>$request->permission_name,
                'perm_id'=>$res->id,
            ]);
            Permission::create([
                'name'=>$request->permission_name.'_create',
                'perm_id'=>$res->id,
            ]);
            Permission::create([
                'name'=>$request->permission_name.'_read',
                'perm_id'=>$res->id,
            ]);
            Permission::create([
                'name'=>$request->permission_name.'_delete',
                'perm_id'=>$res->id,
            ]);
            Permission::create([
                'name'=>$request->permission_name.'_update',
                'perm_id'=>$res->id,
            ]);
        if($res){
            Alert::success('Great', 'Permission Successfully added');
        }else{
            Alert::success('Error', 'Permission not added');
        }
        return redirect()->back();
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
        $single_data  =   Permission::find($id);
        $permissions   =   PermissionName::get();
        return view('admin.permission',compact('permissions','single_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $save_res   =   Permission::where('id', $id)->update([
            'name'  =>$request->permission_name,
        ]);

        if($save_res){
            Alert::alert('Great', 'Permission updated successfully');
            return redirect()->back();
        }else{
            Alert::alert('Error', 'Permission Not Update');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Permission::find($id)->delete();
        if($data){  
         Alert::alert('Great', 'Permission Deleted successfully');
             return redirect()->back();  
        }else{
         Alert::alert('Error', 'Permission not Deleted');
             return redirect()->back();  
        }
    }
}
