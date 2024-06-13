<x-layouts.app>
    <div class="flex min-h-screen h-full items-center justify-center">
        <form action="{{ route('login') }}" method="post">
            @csrf

            <button type="submit" class="bg-white text-zinc-900 px-4 py-2 rounded-full shadow">Login With Mind-Reading</button>
        </form>
    </div>
</x-layouts.app>
