<?php

namespace App\Models;

final class Tweet extends Base
{
    protected $table = 'tweets';

    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
