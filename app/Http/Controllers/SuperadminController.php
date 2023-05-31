<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    //

    function logout()
    {
        session()->flush();
        return redirect('/login');
    }

    function dashboard(Request $r)
    {
        $admin_id = $r->session()->get('admin_id');
       
        if($admin_id)
        {
            return view('admin.admin_dashboard');
            
           
        }

        else{
            return redirect('/login');
        }

    }
}
