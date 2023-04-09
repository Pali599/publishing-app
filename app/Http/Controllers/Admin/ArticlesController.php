<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddReviewerRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Article\ArticleFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('admin.articles.index', compact('article'));
    }

    public function edit($article_id)
    {
        $article = Article::find($article_id);
        $category = Category::all();
        $user = User::all();

        return view('admin.articles.edit', compact('user','article','category'));
    }

    public function update(AddReviewerRequest $request, $article_id)
    {
        $data = $request->validated();

        $article = Article::find($article_id);
        $article->category_id = $data['category_id'];
        $article->reviewer_int = $data['reviewer_int'];
        $article->reviewer_ext = $data['reviewer_ext'];
        $article->published = $request->published == true ? 'yes':'no';

        $article->update();

        return redirect('admin/articles/assigned')->with('message','Article updated Successfully');
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
