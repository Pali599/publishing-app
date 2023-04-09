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
}
