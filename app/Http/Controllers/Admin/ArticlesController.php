<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('admin.articles.index', compact('article'));
    }

    public function delete($article_id)
    {
        $article = Article::find($article_id);
        if($article)
        {
            $article->delete();
            return redirect('admin/articles')->with('message','Article deleted Successfully');
        }
        else
        {
            return redirect('admin/articles')->with('message','No article ID found');
        }
    }
}
