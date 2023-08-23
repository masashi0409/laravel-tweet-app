@if($myTweet)
<div>
  <div>
    <a href="{{ route('tweet.update.index', ['tweetId' => $tweetId]) }}"
      class="flex items-center w-full pt-1 pb-1 pl-3 pr-3 hover:bg-gray-100">
      <span>編集</span>
    </a>
  </div>
</div>
<div>
  <form action="{{ route('tweet.delete', ['tweetId' => $tweetId]) }}" method="post"
    onclick="return confirm('削除してもよろしいですか？');">
    @method('DELETE')
    @csrf
    <button type="submit" class="flex items-center w-full pt-1 pb-1 pl-3 pr-3 hover:bg-gray-100">
      <span>削除</span>
    </button>
  </form>
</div>
@endif