<x-layouts.app>
    <div class="flex min-h-screen h-full">
        <x-sidebar />

        <div class="w-full bg-neutral-800">
            <div class="justify-between h-screen w-full overflow-hidden flex flex-col">
                <div id="messages" class="max-w-3xl mx-auto px-4 py-8 flex flex-col-reverse overflow-y-auto [&::-webkit-scrollbar]:bg-neutral-800 [&::-webkit-scrollbar-thumb]:bg-neutral-900 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar]:w-2">
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
                    @include('messages.partials.create')
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
