<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class AssignedArticlesController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('admin.articles.assigned.index', compact('article'));
    }
}
