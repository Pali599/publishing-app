<?php

namespace App\Http\Controllers\User;

use App\Events\NotificationEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleFormRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\EventDispatcher\Event;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article.index');
    }

    public function add()
    {
        $category = Category::get();
        return view('article.add', compact('category'));
    }

    public function store(ArticleFormRequest $request)
    {
        $data = $request->validated();

        $article = new Article;
        $article->title = $data['title'];
        $article->category_id = $data['category_id'];
        $article->description = $data['description'];
        
        if($request->hasfile('file')){
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/article/', $filename);
            $article->file = $filename;

        }   
        
        $article->keywords = $data['keywords'];
        $article->created_by = Auth::user()->id;
        $article->save();

        Event(new NotificationEmail($article));

        return redirect('/article')->with('message','Article added successfully');

    }
}
