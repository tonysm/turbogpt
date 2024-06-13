<div id="sidebar" data-turbo-permanent class="max-w-64 w-full px-4 py-8 bg-neutral-900">
    <div class="flex items-center justify-between space-x-2">
        <h1 class="text-gray-900 dark:text-gray-200 text-lg font-semibold">
            <a href="{{ route('home') }}">{{ __('TurboGPT') }}</a>
        </h1>

        <a href="{{ route('chats.create') }}" class="inline-block p-2 rounded hover:bg-neutral-800" title="{{ __('New Chat') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

            <span class="sr-only">{{ __('New Chat') }}</span>
        </a>
    </div>

    <x-turbo::stream-from source="chats" type="public" />

    <x-turbo::frame id="rooms-list" target="_top" src="{{ route('chats.index') }}">
        <div class="animate-pulse text-center py-8">{{ __('Loading...') }}</div>
    </x-turbo::frame>
</div>
