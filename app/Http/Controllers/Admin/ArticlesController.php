<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationEmail;
use App\Events\ReviewerAddedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddReviewerRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Article\ArticleFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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
        $suggested_reviewers = $article->suggestedReviewers;
        $unwanted_reviewers = $article->unwantedReviewers;

        return view('admin.articles.edit', compact('user','article','category','suggested_reviewers','unwanted_reviewers'));
    }

    public function update(AddReviewerRequest $request, $article_id)
    {
        $data = $request->validated();

        $article = Article::find($article_id);
        $article->category_id = $data['category_id'];
        $article->reviewer_int = $data['reviewer_int'];
        $article->reviewer_ext = $data['reviewer_ext'];
        $article->reviewer_opt = $data['reviewer_opt'];
        $article->published = $request->published == true ? 'yes':'no';

        $article->update();

        // Dispatch the ArticleCreated event
        event(new ReviewerAddedEvent($article));

        return redirect('admin/articles/assigned')->with('message','Article updated Successfully');
    }

    public function delete($article_id)
    {
        $article = Article::find($article_id);
        if($article)
        {
            $oldFile = $article->file;
            if ($oldFile) {
                File::delete('uploads/article/' . $oldFile);
            }

            $oldLetter = $article->letter;
            if ($oldLetter) {
                File::delete('uploads/cover_letter/' . $oldLetter);
            }

            $article->delete();
            return redirect('admin/articles')->with('message','Article deleted Successfully');
        }
        else
        {
            return redirect('admin/articles')->with('message','No article ID found');
        }
    }
}
