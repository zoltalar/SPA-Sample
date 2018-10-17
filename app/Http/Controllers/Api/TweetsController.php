<?php

namespace App\Http\Controllers\Api;

use App\Events\NewTweet;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tweet as TweetResource;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Validator;

class TweetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {        
        return TweetResource::collection(Tweet::paginate());
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        
        $validator = Validator::make($data, Tweet::rules());

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $tweet = new Tweet();
        $tweet->fill($data);

        if ($tweet->save()) {
            $resource = new TweetResource($tweet);
            event(new NewTweet($resource));
            
            return $resource;
        }
    }
}