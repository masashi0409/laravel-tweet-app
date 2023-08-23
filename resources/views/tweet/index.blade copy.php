<html>
<head>
  <title>Tweet</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <h1 class="text-3xl bg-red-500 font-bold">
    Hello tailwind
  </h1>
  <h1>Tweet</h1>

  @if(session('feedback.success'))
      <p style="color:green">{{ session('feedback.success') }}</p>
  @endif

@auth
  <div>
    <form action="{{ route('tweet.create') }}" method="post">
      @csrf
      <label for="tweet-content">tweet　</label><span style="color: grey">140文字まで</span>
      <div>
        <textarea id="tweet-content" type="text" name="tweet" placeholder="tweet"></textarea>
        @error('tweet')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <div>
          <button type="submit">投稿</button>
        </div>
      </div>
    </form>
  </div>
@endauth

  <h1>つぶやき一覧</h1>
  <div>
  @foreach($tweets as $tweet)
  <div>
    <div>{{ $tweet->content }} by {{ $tweet->user->name }}</div>
    @if(\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
    <div>
      <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
    </div>

    <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
      @method('DELETE')
      @csrf
      <button type="submit">削除</button>
    </form>
    @else
      <p style="color:grey">編集できません</p>
    @endif
  </div>
  @endforeach
  </div>
</body>
</html>