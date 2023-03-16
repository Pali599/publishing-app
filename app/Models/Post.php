<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'file',
        'keywords',
        'created_by',
        'reviewer_int',
        'reviewer_ext',
        'share'
    ];
}
