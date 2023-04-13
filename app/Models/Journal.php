<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $table = 'journals';

    protected $fillable = [
        'title',
        'version',
        'file',
        'published',
        'created_by'
    ];

    public function author()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
