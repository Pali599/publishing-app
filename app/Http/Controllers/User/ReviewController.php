<?php

namespace App\Http\Controllers\User;

use App\Events\ReviewAddedAndNotifyUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Review\AddReviewFormRequest;
use App\Http\Requests\Review\EditReviewFormRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('reviews.index', compact('article'));
    }

    public function display($article_id)
    {
        $article = Article::find($article_id);

        $userId = Auth::user()->id;

        $review = Review::where('article_id', $article->id)
                            ->where('reviewer_id', $userId)
                            ->first();

        return view('reviews.display', compact('article','review'));
    }

    public function add($article_id)
    {
        $article = Article::find($article_id);
        $review = Review::get();
        return view('reviews.add', compact('article','review'));
    }

    public function store(AddReviewFormRequest $request, $article_id)
    {
        $data = $request->validated();
        $article = Article::find($article_id);

        $review = new Review;
        $review->article_id = $article_id;
        $review->reviewer_id = Auth::user()->id;
        $review->result = $data['result'];
        $review->comment = $data['comment'];

        $review->save();

        // Dispatch the ArticleCreated event
        event(new ReviewAddedAndNotifyUserEvent($article));

        return redirect('/review')->with('message','Review added successfully');

    }

    public function edit($review)
    {
        $review = Review::find($review);

        return view('reviews.edit', compact('review'));
    }

    public function update(EditReviewFormRequest $request, $review_id)
    {
        $data = $request->validated();

        $review = Review::find($review_id);
        $review->result = $data['result'];
        $review->comment = $data['comment'];

        $review->update();

        return redirect('/review/display-review/'.$review->article->id)->with('message','Review updated Successfully');
    }
}
