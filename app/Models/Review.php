<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'article_id',
        'reviewer_id',
        'result',
        'comment',
        'improve',
        'comment_author',
        'originality',
        'contribution',
        'technical_quality',
        'presentation_clarity',
        'research_depth',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class,'article_id','id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class,'reviewer_id','id');
    }


}
