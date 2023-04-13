<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Journal;

class HomeSiteController extends Controller
{
    public function index()
    {
        $article = Article::all();
        $journal = Journal::get()->last();
        return view('home.index', compact('article','journal'));
    }

    public function details($article_id)
    {
        $article = Article::find($article_id);
        return view('home.details', compact('article'));
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
