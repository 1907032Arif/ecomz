<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user() -> role == 'admin'){
            return redirect()->route('admin.home');
        }elseif(Auth::user() -> role == 'user'){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('guest.home');
        }
    }

    public function guestHome()
    {
        return view('pages.home');
    }

    public function adminHome()
    {
        return view('admin.admin_dashboard');
    }

      public function userHome()
    {
        return view('pages.home');
    }
}
