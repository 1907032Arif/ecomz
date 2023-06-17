<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;

class AdminController extends Controller
{
    //
    public function aboutCreate(){
        return view('admin.pages.about-us-create');
    }

    public function contactCreate(){
        return view('admin.pages.contact-create');
    }

    public function aboutUpdate(){
        return view('admin.pages.about-us-create');
    }

    public function contactUpdate(){
        return view('admin.pages.contact-create');
    }
}
