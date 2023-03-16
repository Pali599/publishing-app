<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'file',
        'keywords',
        'created_by',
        'reviewer_int',
        'reviewer_ext',
        'share'
    ];
}
