<?php

namespace App\Http\Controllers\Api;

use App\Events\NewTweet;
use App\Http\Controllers\Controller;
use App\Http\Requests\TweetRequest;
use App\Http\Resources\Tweet as TweetResource;
use App\Models\Tweet;

class TweetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {        
        return TweetResource::collection(Tweet::paginate());
    }

    public function store(TweetRequest $request)
    {
        $tweet = new Tweet();
        $tweet->fill($request->only($tweet->getUnguarded()));
        $tweet->user_id = $request->user()->id;

        if ($tweet->save()) {
            $resource = new TweetResource($tweet);
            event(new NewTweet($resource));
            
            return $resource;
        }
    }
}