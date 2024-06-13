<form action="{{ ($chat ?? false) ? route('chats.messages.store', $chat) : route('chats.store') }}" method="POST" class="max-w-3xl w-full mx-auto" data-controller="message-form" data-action="turbo:submit-end->message-form#clearText">
    @csrf

    <div class="flex items-center space-x-2 justify-between bg-neutral-700 rounded-full overflow-hidden px-2 py-2">
        <input id="messageContent" data-message-form-target="text" name="content" data-turbo-permanent type="text" class="px-4 w-full flex-1 text-neutral-100 bg-transparent focus:outline-none text-base autofocus" placeholder="{{ __('Message') }}" />

        <button type="submit" class="bg-neutral-200 text-neutral-900 hover:bg-neutral-300 rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
            </svg>

            <span class="sr-only">{{ __('Send') }}</span>
        </button>
    </div>
    <div class="mt-2 text-center text-sm">{{ __('LLMs are dumb. Never trust what they generate.') }}</div>
</form>
