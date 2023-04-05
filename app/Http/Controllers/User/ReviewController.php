<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ReviewController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('reviews.index', compact('article'));
    }
}
