<?php

namespace App\Http\Controllers;

use App\Models\ClientCertificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function DashboardPage(){
        return view('admin.dashboard');
    }
    public function logout(){
        Auth::logout();
        Alert::alert('Great', 'You have successfully logout!');
        return redirect('/login');
    }
    public function UserProfile($id){
        $user_data  =   User::find($id);
        return view('admin.profile')->with(['user_data'=>$user_data]);
    }
    public function ClientCertificate(){
        $certificate_list   =   ClientCertificate::get();
        return view('admin.certificate',compact('certificate_list'));
    }
    public function UploadCertificate($id){
        return view('admin.upload_certicate',compact('id'));
    }
    public function SaveCertificate(Request $request){
        $request->validate([
            'client_id'=>'required',
            'certificate'=>'required',
        ]);

        if($request->hasFile('certificate')){
            $name   = 'certificate'.rand(0,1).time().'.'.$request->certificate->extension();
            $path   = public_path().'/admin/certificate';
            $request->certificate->move($path,$name);
            $res    =   ClientCertificate::create([
                'user_id'=>$request->client_id,
                'certificate'=>$name,
                'status'=>1,
            ]);
        }
        if($res){
            Alert::alert('Success','Successfully uploaded Certificate');
            return redirect()->route('clienturl.create');
        }else{
            Alert::alert('Error',' Certificate not uploaded');
            return redirect()->route('clienturl.create');
        }
    }
    public function MyCertificate(){
        $crtfct =   ClientCertificate::where('user_id',Auth::user()->id)->first();
        // dd($crtfct);
        return view('admin.my_certificate',compact('crtfct'));
    }
}
