<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeSiteController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('home.index', compact('article'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }
}
