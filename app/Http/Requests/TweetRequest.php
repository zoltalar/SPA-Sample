<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
{
    // Override
    protected function validationData()
    {
        return array_merge($this->all(), [
            'user_id' => $this->user()->id
        ]);
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required',
            'user_id' => 'required'
        ];
    }
}
