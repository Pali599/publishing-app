<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeSiteController extends Controller
{
    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }
}
