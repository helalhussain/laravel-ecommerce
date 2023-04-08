<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Session;
Session_start();

class AdminAuthController extends Controller
{
    public function admin_dashboard_page(){
        return view('admin.dashboard');
    }
    public function admin_login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);


        $result = Admin::where('email','=',$request->email)->first();
        if(Hash::check($request->password,$result->password)){
            Session::put('admin_id',$result->id);
            Session::put('admin_name',$result->name);
            Session::put('admin_email',$result->email);
            return redirect()->route('admin_dashboard.page');
        }else{
            return redirect()->back()->with('fail','Login failled');
        }

    }
    public function admin_logout(){
        Session::forget('admin_id');
        Session::forget('admin_name');
        Session::forget('admin_email');
        return redirect()->route('admin_login.page')->with('success','Admin logout');
    }
}
