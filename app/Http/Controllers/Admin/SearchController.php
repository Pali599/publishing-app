<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, $model)
    {
        $query = $request->input('query');
        $results = [];

        if ($model === 'article') {
            $results = Article::with(['author', 'internal', 'external', 'reviewerOpt'])
                              ->where(function (Builder $subquery) use ($query) {
                                  $subquery->where('title', 'like', '%' . $query . '%')
                                           ->orWhereHas('author', function (Builder $q) use ($query) {
                                               $q->where('name', 'like', '%' . $query . '%');
                                           })
                                           ->orWhereHas('internal', function (Builder $q) use ($query) {
                                               $q->where('name', 'like', '%' . $query . '%');
                                           })
                                           ->orWhereHas('external', function (Builder $q) use ($query) {
                                               $q->where('name', 'like', '%' . $query . '%');
                                           })
                                           ->orWhereHas('reviewerOpt', function (Builder $q) use ($query) {
                                               $q->where('name', 'like', '%' . $query . '%');
                                           });
                              })->get();
        } elseif ($model === 'user') {
            $results = User::where('name', 'like', '%' . $query . '%')->get();
        } else {
            // Handle other models
        }
    
        return response()->json($results);
    }

    protected function getModelClass($model)
    {
        $models = [
            'article' => \App\Models\Article::class,
            'user' => \App\Models\User::class,
            'journal' => \App\Models\Journal::class,
            'category' => \App\Models\Category::class,
            'review' => \App\Models\Review::class,
            // Add more models as needed
        ];

        return $models[strtolower($model)] ?? null;
    }
}
