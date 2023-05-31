<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;

class adminController extends Controller
{
    //
    function index()
    {
        return view('admin.admin_login');
    }
    function dashboard()
    {
        return view(('admin.admin_dashboard'));
    }
    function login(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
          {
            return redirect('admin_dashboard');
          }
          else
          {
            return view('admin.admin_login');
          }
    }
    function auth(Request $request)
    {
        $admin_email = $request->email;
        $admin_password = md5($request->password);
        $result = admin::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        
        if($result)
        {
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('admin_id', $result->admin_id);
            $request->session()->put('admin_name', $result->admin_name);
            return redirect('admin_dashboard');
        }
        else
        {
         
            $request->session()->flash('error','Email or password is invalid' );
            return redirect('login');  
         
        }


    }
}
