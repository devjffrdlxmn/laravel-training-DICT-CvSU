<x-app>
    <x-slot:title>
        Available Games
    </x-slot:title>

    <div class="min-h-screen flex flex-col items-center justify-start bg-gray-100 py-12">

        <div class="w-full max-w-3xl px-4">
           
            <!-- Action Links -->
            <div class="flex justify-center gap-4 mb-8 text-sm text-gray-600">
                <a href="{{ route('games.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    New Game
                </a>

                @if($owned)
                    <a href="{{ route('games.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                        Show All Games
                    </a>
                @else
                    <a href="{{ route('games.index', ['owned'=>true]) }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                        Show My Games Only
                    </a>        
                @endif
            </div>

            <!-- Game List -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @forelse ($games as $game)
                    <div class="bg-white shadow-md rounded-xl p-4 hover:shadow-xl transition border border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $game->name }}
                                @if($game->creator->is(auth()->user()))
                                    <span class="text-xs text-green-600 font-medium ml-2">[You]</span>
                                @endif
                            </h3>
                            <span class="text-sm text-gray-500">#{{ $loop->iteration }}</span>
                        </div>
                        <p class="text-gray-600 mb-3 text-sm">
                            Created by: {{ $game->creator->name }}
                        </p>
                        <a href="{{ route('games.show', compact('game')) }}"
                            class="block text-center bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">
                            Play
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-gray-500 text-center p-6">
                        No Games Available 😔
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</x-app>