<?php

namespace App\Models;

use App\Models\User;

final class Tweet extends Base
{
    protected $table = 'tweets';

    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * General validation rules.
     *
     * @return  array
     */
    public static function rules()
    {
        return [
            'content' => 'required',
            'user_id' => 'required'
        ];
    }
}
