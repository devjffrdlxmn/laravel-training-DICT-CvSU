<x-app>
    <x-slot:title>
        CREATE GAME
    </x-slot:title>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-6 py-12">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg border border-gray-200 p-8">
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('games.index') }}" 
                   class="inline-flex items-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back
                </a>
                <h1 class="text-xl font-bold text-gray-800">Create Game</h1>
                <div class="w-10"></div>
            </div>
            <form method="POST" action="{{ route('games.store') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"  
                        value="{{ old('name') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter game name"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">Create New Game</button>
                </div>
            </form>
        </div>
    </div>
</x-app>