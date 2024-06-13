<x-turbo::frame id="rooms-list">
    <ul class="mt-6 space-y-1" id="rooms">
        @foreach ($chats as $chat)
        @include('chats.partials.chat', ['chat' => $chat])
        @endforeach
    </ul>
</x-turbo::frame>
