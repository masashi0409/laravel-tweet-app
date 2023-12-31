  <div class="p-4">
    <form action="{{ route('tweet.create') }}" method="post">
      @csrf
      <div class="mt-1">
        <textarea 
          name="tweet"
          id="tweet-content"
          type="text"
          row="3"
          class="focus:ring-blue-400 focus:border-blue-400 mt-1 block
          w-full sm:text-sm border border-gray-300 rouded-md p-2"
          placeholder="つぶやきを入力"></textarea>

        <p class="mt-2 text-sm text-gray-500">
          140文字まで
        </p>

        @error('tweet')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror

        <div class="flex flex-wrap justify-end">
          <x-element.button>つぶやく</x-element.button>
        </div>
      </div>
    </form>
  </div>
