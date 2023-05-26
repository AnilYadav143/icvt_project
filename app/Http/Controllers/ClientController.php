<?php

namespace App\Http\Controllers;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.add_client');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client_list = User::get();
        return view('admin.manage_client',compact('client_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname'     =>'required',
            'lname'     =>'required',
            'email'     =>'required',
            'password'  =>'required',
            'phone'     =>'required',
            'country'   =>'required',
            'state'     =>'required',
            'city'      =>'required',
            'address'   =>'required',
        ]);
        if($request->has('profile')){
          $name =  'cprofile'.rand(0,1).time().'.'.$request->profile->extension();
          $path =   public_path().'/clients_profile';
          $request->profile->move($path,$name);
        }
        $res    =   User::create([
            'firstname' =>$request->fname,
            'lastname'  =>$request->lname,
            'email'     =>$request->email,
            'password'  =>Hash::make($request->password),
            'phone'     =>$request->phone,
            'country'   =>$request->country,
            'state'     =>$request->state,
            'city'      =>$request->city,
            'address'   =>$request->address,
            'profile'   =>$name??null,
            'status'   =>1,
        ]);
        if($res){
            $res->assignRole('Client');
            Alert::alert('Great', 'User Added successfully!');
            return redirect()->back();
        }else{
            Alert::alert('toast_error', 'User not Added!');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $single_data    =   User::find($id);
        return view('admin.add_client',compact('single_data'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $request->validate([
            'fname'     =>'required',
            'lname'     =>'required',
            'email'     =>'required',
            'phone'     =>'required',
            'country'   =>'required',
            'state'     =>'required',
            'city'      =>'required',
            'address'   =>'required',
        ]);
        // dd($request->all());
        if($request->has('profile')){
          $name =  'cprofile'.rand(0,1).time().'.'.$request->profile->extension();
          $path =   public_path().'/clients_profile';
          $request->profile->move($path,$name);
          User::find($id)->update(['profile'=>$name]);
        }
        $res    =   User::find($id)->update([
            'firstname' =>$request->fname ?? '',
            'lastname'  =>$request->lname ?? '',
            'email'     =>$request->email ?? '',
            'phone'     =>$request->phone ?? '',
            'country'   =>$request->country ?? '',
            'state'     =>$request->state ?? '',
            'city'      =>$request->city ?? '',
            'address'   =>$request->address ?? '',
        ]);
        if($res){
            if($request->hasFile('profile') && isset($request->old_pro_img)){
                unlink($path.'/'.$request->old_pro_img);
            }
            Alert::alert('Great', 'Client updated successfully');
            return redirect()->route('clienturl.create');
        }else{
            Alert::alert('Error', 'Client Not Update');
            return redirect()->route('clienturl.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->roles()->detach();
        $data->delete();
        if($data){  
         Alert::alert('Great', 'User Deleted successfully');
             return redirect()->back();  
        }else{
         Alert::alert('Error', 'User not Deleted');
             return redirect()->back();  
        }
    }
}
