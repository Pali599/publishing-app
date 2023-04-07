<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class AdminReviewController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('admin.reviews.index', compact('article'));
    }
}
