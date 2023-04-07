<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'article_id',
        'reviewer_int',
        'reviewer_ext',
        'result_int',
        'result_ext',
        'comment_int',
        'comment_ext'
    ];
}
