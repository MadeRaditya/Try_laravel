<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['anime_mal_id', 'user_email', 'username','comment', 'anime_title', 'parent_id'];
    
    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }

}
