<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
      if (!$tweetService->checkOwnTweet($request->user()->id, $request->id())) {
        throw new AccessDeniedHttpException();
      }

      $tweetId = (int) $request->route('tweetId');
      $tweet = Tweet::where('id', $tweetId)->firstOrFail();
      $tweet->delete();
      // Tweet::destroy($tweetId) でもよい
      return redirect()
        ->route('tweet.index')
        ->with('feedback.success', 'つぶやきを削除しました。');
    }
}
