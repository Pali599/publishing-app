<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class AdminJournalController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('admin.journals.index', compact('article'));
    }
}
