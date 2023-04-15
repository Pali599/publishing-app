<?php

namespace App\Http\Controllers\User;

use App\Events\ArticleEditedEvent;
use App\Events\NotificationEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleFormRequest;
use App\Http\Requests\Article\EditUserArticleFormRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\EventDispatcher\Event;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;



class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('article.index', compact('article'));
    }

    public function add()
    {
        $category = Category::get();
        $user = User::get();
        return view('article.add', compact('category','user'));
    }

    public function store(ArticleFormRequest $request)
    {
        $data = $request->validated();

        $article = new Article;
        $article->title = $data['title'];
        $article->category_id = $data['category_id'];
        $article->description = $data['description'];
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueId = (string) Str::uuid();
            $filename = $originalName . '_' . $uniqueId . '.' . $extension;
            $file->move('uploads/article/', $filename);
            $article->file = $filename;
        }
        
        $article->keywords = $data['keywords'];

        if ($request->hasFile('letter')) {
            $letter = $request->file('letter');
            $extension = $letter->getClientOriginalExtension();
            $originalName = pathinfo($letter->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueId = (string) Str::uuid();
            $lettername = $originalName . '_' . $uniqueId . '.' . $extension;
            $letter->move('uploads/cover_letter/', $lettername);
            $article->letter = $lettername;
        }  
        $article->created_by = Auth::user()->id;
        $article->save();

        $suggestedReviewers = $request->input('suggested_reviewers');
        $article->suggestedReviewers()->attach($suggestedReviewers);

        $unwantedReviewers = $request->input('unwanted_reviewers');
        $article->unwantedReviewers()->attach($unwantedReviewers);

        // Dispatch the NotificationEmail event
        event(new NotificationEmail($article));

        return redirect('/article')->with('message','Article added successfully');

    }

    public function display($article_id)
    {
        $article = Article::find($article_id);

        $review_int = Review::where('article_id', $article->id)
                            ->whereHas('reviewer', function($query) {
                                $query->where('type_id', 1);
                            })
                            ->first();

        $review_ext = Review::where('article_id', $article->id)
                            ->whereHas('reviewer', function($query) {
                                $query->where('type_id', 2);
                            })
                            ->first();
                            
        return view('article.display', compact('article','review_int','review_ext'));
    }

    public function edit($article_id)
    {
        $article = Article::find($article_id);
        $category = Category::all();
        $user = User::all();

        return view('article.edit', compact('user','article','category'));
    }

    public function update(EditUserArticleFormRequest $request, $article_id)
    {
        Log::info('Update method called.');
        $data = $request->validated();

        $article = Article::find($article_id);
        $article->title = $data['title'];
        $article->category_id = $data['category_id'];
        $article->description = $data['description'];

        if ($request->hasFile('file')) {

            Log::info('Request has a file.');

            $oldFile = $article->file;
            Log::info("old file is {$oldFile}");
            if ($oldFile) {
                File::delete('uploads/article/' . $oldFile);
            }
    
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueId = (string) Str::uuid();
            $filename = $originalName . '_' . $uniqueId . '.' . $extension;
            $file->move('uploads/article/', $filename);

            Log::info("File moved to: uploads/article/{$filename}");
            $article->file = $filename;
        } 

        $article->keywords = $data['keywords'];

        $article->update();

        // Dispatch the ArticleCreated event
        event(new ArticleEditedEvent($article));

        return redirect('article')->with('message','Article updated Successfully');
    }

    public function delete($article_id)
    {
        $article = Article::find($article_id);
        if($article)
        {
            $article->delete();
            return redirect('article')->with('message','Article deleted Successfully');
        }
        else
        {
            return redirect('article')->with('message','No article ID found');
        }
    }
}
