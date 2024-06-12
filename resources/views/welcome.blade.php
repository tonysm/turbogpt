<x-layouts.app>
    <div class="flex min-h-screen h-full">
        <div class="max-w-64 w-full px-4 py-8 bg-neutral-900">
            <div class="flex items-center justify-between space-x-2">
                <h1 class="text-gray-900 dark:text-gray-200 text-lg font-semibold">
                    {{ __('TurboGPT') }}
                </h1>

                <a href="#" class="inline-block p-2 rounded hover:bg-neutral-800" title="{{ __('New Chat') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                    <span class="sr-only">{{ __('New Chat') }}</span>
                </a>
            </div>

            <ul class="mt-6 space-y-1">
                <li class="relative flex items-center space-x-2 px-4 py-1.5 overflow-hidden rounded-lg bg-neutral-800 text-white text-sm">
                    <a href="#" class="flex-1 truncate">LLM Explained <span class="absolute inset-0">&nbsp;</span></a>

                    <form action="#" class="z-10" data-turbo-confirm="{{ __('Are you sure you want to delete this chat?') }}">
                        <button type="submit" class="px-2 py-1 rounded text-xs hover:bg-neutral-900">
                            <span class="sr-only">{{ __('Delete') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </li>
                <li class="relative flex items-center space-x-2 px-4 py-1.5 overflow-hidden rounded-lg bg-neutral-800 text-white text-sm">
                    <a href="#" class="flex-1 truncate">Some really long title that will probably wrap <span class="absolute inset-0">&nbsp;</span></a>

                    <form action="#" class="z-10" data-turbo-confirm="{{ __('Are you sure you want to delete this chat?') }}">
                        <button type="submit" class="px-2 py-1 rounded text-xs hover:bg-neutral-900">
                            <span class="sr-only">{{ __('Delete') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="w-full bg-neutral-800">
            <div class="justify-between h-screen w-full overflow-hidden flex flex-col">
                <div class="max-w-3xl mx-auto px-4 py-8 flex flex-col-reverse overflow-y-auto [&::-webkit-scrollbar]:bg-neutral-800 [&::-webkit-scrollbar-thumb]:bg-neutral-900 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar]:w-2" id="messages">
                    @foreach (range(1, 20) as $index)
                    <div @class(["text-neutral-100 p-4 flex space-x-5", "mr-0 ml-auto max-w-lg bg-neutral-700 rounded-lg"=> $index % 2 !== 0])>
                        @if ($index % 2 === 0)
                        <div>
                            <div class="p-2 bg-neutral-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                                </svg>
                            </div>
                        </div>
                        @endif
                        <div>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut repellendus ratione itaque provident quod laudantium eius nam, rerum veniam alias, in iure accusamus sunt inventore. Quas tenetur necessitatibus in cum.
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="py-6 w-full bg-neutral-800">
                    <form action="#" class="max-w-3xl w-full mx-auto">
                        <div class="flex items-center space-x-2 justify-between bg-neutral-700 rounded-full overflow-hidden px-2 py-2">
                            <input type="text" class="px-4 w-full flex-1 text-neutral-100 bg-transparent focus:outline-none text-base autofocus" placeholder="{{ __('Message') }}" />

                            <button type="submit" class="bg-neutral-200 text-neutral-900 hover:bg-neutral-300 rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                                </svg>

                                <span class="sr-only">{{ __('Send') }}</span>
                            </button>
                        </div>
                        <div class="mt-2 text-center text-sm">{{ __('LLMs are dumb. Never trust what they generate.') }}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
