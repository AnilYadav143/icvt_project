<?php

namespace App\Http\Controllers;

use App\Models\ClientCertificate;
use App\Models\Gallery;
use App\Models\StudentAdmission;
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
            $name   = 'certificate'.rand(0,100).time().'.'.$request->certificate->extension();
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
    public function InstituteImg(){
        $inst_ids = $users = User::role('Client')->get();
        return view('admin.institute_img',compact('inst_ids'));
    }
    public function InsSaveImg(Request $request){
        // dd($request['institute_id']);
        $request->validate([
            "institute_id"  => "required",
            "image"         => 'required',
        ]);

        if ($request->file('image')) {
            $files = $request->file('image');
            
            $images = [];
            foreach ($files as $file) {
                $name = 'gallery-' . rand(0, 10000) . time() . '.' . $file->extension();
                $destinationPath ='/gallery';
                $fullname = $destinationPath.'/'.$name;
                $file->move(public_path($destinationPath), $name);
                $images[] = $fullname;
            }
        }
// echo "<pre>";print_r($images);die;
        $save_res = Gallery::create([
            "institute_id" => $request->institute_id,
            "image" => json_encode($images),
        ]);
        if($save_res){
            Alert::alert('Great', 'Institute Image Saved!');
            return redirect()->back();
        }else{
            Alert::alert('Error', 'Institute Image not Saved!');
            return redirect()->back();
        }
    }
    public function DisplayImg(){
        $institute_imgs = Gallery::where('institute_id',Auth::id())->get();
        // dd($institute_imgs);
        return view('admin.institute_imgs',compact('institute_imgs'));
    }
    /**
     * Manage Institute Gallery image Form
     */
    public function ManageInstImg(){
        $inst_imgs = Gallery::get();
        return view('admin.manage_inst_img',compact('inst_imgs'));
    }
    /**
     * Manage Institute Gallery image edit Form
     */
    public function EditInstImg($id){
        dd('edit');
    }
    public function DeleteInstImg($id){
        $data = Gallery::find($id)->delete();
        if($data){  
            // unlink($path.'/'.$request->old_pro_img);
            Alert::alert('Great', 'Institute Gallery Deleted successfully');
             return redirect()->back();  
        }else{
            Alert::alert('Error', 'Institute Gallery not Deleted');
             return redirect()->back();  
        }
    }

    public function AdmissionCSV(){
        $inst_ids = $users = User::role('Client')->get();
        return view('admin.admission_csv',compact('inst_ids'));
    }

    public function SaveAdmission(Request $request){
        $request->validate([
            'institute_id'=>'required',
            'excel'=>'required',
        ]);

        if($request->hasFile('excel')){
            $name   = 'admission'.rand(0,100).time().'.'.$request->excel->extension();
            $path   = public_path().'/admin/admission_excel';
            $request->excel->move($path,$name);
            $res    =   StudentAdmission::create([
                'institute_id'=>$request->institute_id,
                'excel'=>$name,
                'status'=>1,
            ]);
        }
        if($res){
            Alert::alert('Success','Successfully uploaded Admission Sheet');
            return redirect()->route('show_admission');
        }else{
            Alert::alert('Error',' Sheet not uploaded');
            return redirect()->route('admission_csv');
        }
    }
    public function ShowAdmission(){
        $stu_excel =   StudentAdmission::where('institute_id',Auth::user()->id)->first();
        // dd($stu_excel);
        return view('admin.show_admission',compact('stu_excel'));
    }


}
