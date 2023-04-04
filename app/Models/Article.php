<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

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

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function author()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function reviewer_int()
    {
        return $this->belongsTo(User::class,'reviewer_int','id');
    }

    public function reviewer_ext()
    {
        return $this->belongsTo(User::class,'reviewer_ext','id');
    }
}
