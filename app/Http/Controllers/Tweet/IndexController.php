<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
// use App\Models\Tweet;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
      // $ tweets = Tweet::orderBy('created_at', 'DESC')->get();

      // $tweetService = new TweetService(); // 依存性の注入でTweetServiceを外部から受け取る
      $tweets = $tweetService->getTweets();

      return view('tweet.index')
        ->with('tweets', $tweets);
    }
}
