<x-app>
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-3xl mx-auto px-6">

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8">

                <x-slot:title>
                    {{ ucwords(str_replace('_',' ',$challenge->category)) }} 
                </x-slot:title>

                <!-- Header -->
                <a 
                    href="{{ route('games.index') }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">← Back
                </a>
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $name }}
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Word Challenge
                    </p>
                </div>

                <!-- Status -->
                @if($challenge->isCompleted())
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-center font-medium">
                        Congratulations! You solved the challenge.
                    </div>
                @elseif ($challenge->isFailed())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-center font-medium">
                        Challenge failed. The correct word was <strong>{{ $challenge->word }}</strong>.
                    </div>
                @endif

                <!-- Game Info -->
                <div class="flex justify-between items-center text-sm text-gray-600 mb-8">
                    <div>
                        <span class="font-medium text-gray-700">Category:</span>
                        {{ ucwords(str_replace('_',' ',$challenge->category)) }}
                    </div>

                    <div>
                        <span class="font-medium text-gray-700">Lives:</span>
                        <span class="text-red-500 font-semibold">
                            {{ $challenge->lives }}
                        </span>
                    </div>
                </div>

                <!-- Word Display -->
                <div class="text-center text-3xl tracking-widest font-semibold text-gray-800 mb-10">
                    {{ $challenge }}
                </div>

                <!-- Form -->
                <form method="post" action="{{ route('games.update', compact('id')) }}" class="space-y-6">
                    @method('put')
                    @csrf

                    @error('guess')
                        <div class="text-sm text-red-600 text-center">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Keyboard -->
                    <div class="flex justify-center">
                        <x-keyboard :disabled-keys="$disabledKeys"/>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-center gap-4 pt-4">

                        @if(!$challenge->isOver())
                            <button 
                                type="submit"
                                name="skip"
                                value="true"
                                class="px-5 py-2.5 bg-gray-700 text-white rounded-lg hover:bg-gray-800 transition"
                            >
                                Skip Challenge
                            </button>
                        @else
                            <a 
                                href="{{ route('games.show', compact('id')) }}"
                                class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                            >
                                Next Challenge
                            </a>
                        @endif


                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app>