<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tweet as TweetResource;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Validator;

class TweetsController extends Controller
{
    public function index()
    {
        return TweetResource::collection(Tweet::paginate());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Tweet::rules());

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $tweet = new Tweet();
        $tweet->fill($request->only($tweet->getUnguarded()));

        if ($tweet->save()) {
            return new TweetResource($tweet);
        }
    }
}