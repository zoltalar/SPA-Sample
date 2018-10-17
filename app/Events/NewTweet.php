<?php

namespace App\Events;

use App\Models\Tweet;
use App\Http\Resources\Tweet as TweetResource;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewTweet implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    /**
     * Newly created tweet.
     * 
     * @var \App\Http\Resources\Tweet
     */
    public $tweet;
    
    public function __construct(TweetResource $tweet)
    {
        $this->tweet = $tweet;
    }

    public function broadcastOn()
    {
        return new Channel('tweets');
    }
}
