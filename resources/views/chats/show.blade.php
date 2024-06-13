<x-layouts.app>
    <x-slot name="meta">
        <x-turbo::refreshes-with method="morph" scroll="preserve" />
    </x-slot>

    <div class="flex min-h-screen h-full">
        <x-sidebar />

        @if (session('chat_recently_created'))
        <x-turbo::stream target="rooms" action="append">@include('chats.partials.chat', ['chat' => $chat])</x-turbo::stream>
        @endif

        <x-turbo::stream-from :source="$chat" />

        <div class="w-full bg-neutral-800">
            <div class="justify-between h-screen w-full overflow-hidden flex flex-col">
                <div id="{{ dom_id($chat, 'messages') }}" class="max-w-3xl mx-auto w-full px-4 py-8 flex flex-col-reverse overflow-y-auto [&::-webkit-scrollbar]:bg-neutral-800 [&::-webkit-scrollbar-thumb]:bg-neutral-900 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar]:w-2">
                    @foreach ($chat->messages->reverse() as $message)
                    @include('messages.partials.message', ['message' => $message])
                    @endforeach
                </div>

                <div class="py-6 w-full bg-neutral-800">
                    @include('messages.partials.form', [
                    'chat' => $chat,
                    ])
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
