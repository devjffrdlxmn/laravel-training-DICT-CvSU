<x-app>
    <x-slot:title>
        MY GAMES
    </x-slot:title>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-6 py-12">
        <div class="w-full max-w-3xl bg-white rounded-xl shadow-lg border border-gray-200 p-8">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-800">MY GAMES</h1>
                <a href="{{ route('games.create') }}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Create New Game
                </a>
            </div>
            <ul class="space-y-3">
                @forelse($games as $id => $game)
                    <li>
                        <a href="{{ route('games.show', compact('id')) }}" 
                           class="block p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition flex justify-between items-center">
                            <span class="font-medium text-gray-800">{{ $loop->iteration }}. {{ $game['name'] }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </li>
                @empty
                    <div class="text-center py-10 text-gray-500 bg-gray-50 border border-gray-200 rounded-lg">
                        No Games
                    </div>
                @endforelse
            </ul>
        </div>
    </div>
</x-app>