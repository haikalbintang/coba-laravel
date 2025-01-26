@if ( $reply->user_id !== Auth::id())
<div class="ml-[108px] bg-gray-800 p-2.5 rounded-lg flex justify-between mb-4">
  <div class="w-[100px] flex p-1">
    <img class="w-[80px] h-[80px] rounded-full p-1 bg-gray-900" src="https://picsum.photos/180/180/?random={{ $reply->user_id }}" alt="">
  </div>
  <div class="w-full ml-2">
    <div class="flex items-center justify-between px-1">
      <div class="flex items-center space-x-3">
        <p class="text-lg font-bold">{{ $reply->user->name }}</p>
        <p class="text-sm text-gray-400">joined since {{ $reply->user->created_at->diffForHumans() }}</p>
      </div>
      <div>
        <p class="text-sm text-gray-400">posted {{ $reply->created_at->diffForHumans() }}</p>
      </div>
    </div>
    <p class="pt-2 p-2.5 mt-2 text-white bg-gray-900 rounded-lg">{{ $reply->text }}</p>
  </div>
</div>
@else
  <div class="ml-[108px] bg-gray-600 p-2.5 rounded-lg flex justify-between mb-4 space-x-2">
    <div class="w-full ml-2">
      <div class="flex items-center justify-between px-1">
        <div class="flex items-center space-x-3">
          <p class="text-lg font-bold">{{ $reply->user->name }}</p>
          <p class="text-sm text-gray-400">joined since {{ $reply->user->created_at->diffForHumans() }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-400">posted {{ $reply->created_at->diffForHumans() }}</p>
        </div>
      </div>
      <p class="pt-2 p-2.5 mt-2 text-white bg-gray-900 rounded-lg">{{ $reply->text }}</p>
    </div>
    <div class="w-[100px] flex p-1">
      <img class="w-[80px] h-[80px] rounded-full p-1 bg-gray-900" src="https://picsum.photos/180/180/?random={{ $reply->user_id }}" alt="">
    </div>
  </div>  
@endif
