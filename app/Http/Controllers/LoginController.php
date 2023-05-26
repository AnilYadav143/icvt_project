<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function UsersLogin(){
        return view('admin.login');
    }
    public function LoginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            Alert::alert('Great', 'You have successfully Login!');
            return redirect()->route('dashboard');
        }
        Alert::alert('Error', 'Email or Password is incurrect!');
        return redirect("login");
    }
    
}
