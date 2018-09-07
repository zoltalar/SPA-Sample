<?php

namespace App\Models;

final class Tweet extends Base
{
    protected $table = 'tweets';

    protected $guarded = ['id'];

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
