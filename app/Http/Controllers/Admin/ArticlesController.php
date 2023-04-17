<?php

namespace App\Http\Controllers\Admin;

use App\Events\ArticleDeletedEvent;
use App\Events\NotificationEmail;
use App\Events\ReviewerAddedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddReviewerRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Article\ArticleFormRequest;
use App\Models\Review;
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
        if($data['reviewer_opt'] != 0){
            $article->reviewer_opt = $data['reviewer_opt'];
        } else {
            $article->reviewer_opt = null;
        }
        $article->published = $request->published == true ? 'yes':'no';

        $article->update();

        // Dispatch the ReviewerAddedEvent event
        event(new ReviewerAddedEvent($article));

        return redirect('admin/articles/assigned')->with('message','Article updated Successfully');
    }

    public function delete($article_id)
    {
        $article = Article::find($article_id);
        $review = Review::where('article_id', $article->id)->get();
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

            if ($review) {
                $review->each->delete();
            }

            $article->suggestedReviewers()->detach();
            $article->unwantedReviewers()->detach();
            
            $article->delete();

            // Dispatch the ArticleDeletedEvent event
            event(new ArticleDeletedEvent($article));

            return redirect('admin/articles')->with('message','Article deleted Successfully');
        }
        else
        {
            return redirect('admin/articles')->with('message','No article ID found');
        }
    }
}
