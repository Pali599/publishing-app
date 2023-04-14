<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Review;
use App\Models\User;


class AdminReviewController extends Controller
{
    public function index()
    {
        $article = Article::all();
        $review = Review::all();
        $user = User::all();
        return view('admin.reviews.index', compact('article','review','user'));
    }

    public function delete($review_id)
    {
        $review = Review::find($review_id);
        if($review)
        {
            $review->delete();
            return redirect('admin/reviews')->with('message','Review deleted Successfully');
        }
        else
        {
            return redirect('admin/reviews')->with('message','No review ID found');
        }
    }
}
