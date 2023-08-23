<x-layout title="編集 | つぶやきアプリ">
  <x-layout.single>
    <h2 class="text-center text-blue-400 text-4xl font-bold mt-8 mb-8">つぶやきアプリ</h2>
    <a href="{{ route('tweet.index') }}">もどる</a>
    <x-tweet.form.put :tweet="$tweet"></x-tweet.form.put>
  </x-layout.single>
</x-layout>