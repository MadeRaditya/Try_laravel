<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Collection extends Model
{
    protected $fillable =  ['anime_mal_id', 'user_email', 'anime_image', 'anime_title'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
}
