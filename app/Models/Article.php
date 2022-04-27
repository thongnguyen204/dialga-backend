<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'abstract',
        'image','content',
        'user_id'
    ];

    /**
     * Get the user that owns the article
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
