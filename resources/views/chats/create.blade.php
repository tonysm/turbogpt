<x-layouts.app>
    <div class="flex min-h-screen h-full">
        <x-sidebar />

        <div class="w-full bg-neutral-800">
            <div class="justify-between h-screen w-full overflow-hidden flex flex-col">
                <div class="max-w-3xl mx-auto px-4 py-8 h-full flex items-center justify-center">
                    <div class="grid grid-cols-4 gap-4">
                        @foreach (['Write a souless, bad poem.', 'Explain subconductors (because we all must know that, amiright?).', 'Write a thank-you note (because I do not care about that person anyways).', 'Summarize an email for me because I do not care enough to read it myself.'] as $template)
                        <form action="{{ route('chats.store') }}" method="post" class="relative flex items-center justify-center px-4 py-3 rounded-lg shadow border boder-zinc-600 text-zinc-300 text-sm">
                            @csrf

                            <input type="hidden" name="content" value="{{ $template }}" />

                            {{ $template }}

                            <button type="submit"><span class="absolute inset-0"></span></button>
                        </form>
                        @endforeach
                    </div>
                </div>

                <div class="py-6 w-full bg-neutral-800">
                    @include('messages.partials.form')
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
