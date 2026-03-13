<x-app>
    <x-slot:title>
        {{ $stage->challenge->category }}
    </x-slot:title>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <!-- Game Title -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">{{ $game->name }}</h1>

        <!-- Stage Status -->
        @if($stage->isCompleted())
            <div class="bg-green-100 text-green-800 border border-green-300 rounded-lg p-4 mb-4 text-center">
                🎉 Congratulations! Stage completed!
            </div>
        @elseif($stage->isFailed())
            <div class="bg-red-100 text-red-800 border border-red-300 rounded-lg p-4 mb-4 text-center">
                ❌ You failed! The word was: <span class="font-semibold">{{ $stage->challenge->word }}</span>
            </div>
        @endif

        <!-- Game Info -->
        <div class="flex justify-between bg-gray-50 p-4 rounded-lg mb-6">
            <div>
                <span class="font-semibold">Score:</span> {{ $stage->player->score }}
            </div>
            <div>
                <span class="font-semibold">Category:</span> {{ $stage->challenge->category }}
            </div>
            <div>
                <span class="font-semibold">Remaining Lives:</span> {{ $stage->lives }}
            </div>
        </div>

        <!-- Current Stage Display -->
        <div class="text-center text-2xl font-mono tracking-widest mb-6">
            {{ $stage }}
        </div>

        <!-- Guess Form -->
        <form method="post" action="{{ route('games.update', compact('game')) }}" class="text-center">
            @method('put')
            @csrf

            @error('guess')
                <div class="text-red-600 mb-4">{{ $message }}</div>
            @enderror

            <!-- Keyboard Component -->
            <div class="mb-4">
                <x-keyboard :disabled-keys="$disabledKeys"/>
            </div>

            @if(!$stage->isOver())
                <button type="submit" name="skip" value=true
                    class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition font-medium">
                    Skip Stage
                </button>
            @else
                <a href="{{ route('games.show', ['game'=>$game, 'next'=>true]) }}"
                    class="w-full inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors">
                    Next Stage
                </a>
            @endif
        </form>

        <!-- Top Players -->
        @php $topGamers = $game->getTopGamers() @endphp
        @if($topGamers->isNotEmpty())
            <hr class="my-6">
            <div>
                <h2 class="text-xl font-bold mb-4">🏆 Top Players</h2>
                <ol class="list-decimal list-inside space-y-1">
                    @foreach ($topGamers as $gamer)
                        <li class="text-gray-700">
                            {{ $gamer->name }} - <span class="font-semibold">{{ $gamer->player->score }} point(s)</span>
                        </li>
                    @endforeach
                </ol>
            </div>
        @endif
    </div>
</x-app>