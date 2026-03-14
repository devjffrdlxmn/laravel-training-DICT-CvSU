<x-app>
    <x-slot:title>
        Create New Word Guest
    </x-slot:title>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">

            <!-- Page Title -->
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
                📝 Create New Word Guest
            </h2>

            <!-- Create Game Form -->
            <form method="POST" action="{{ route('games.store') }}" class="space-y-5">
                @csrf

                <!-- Game Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Game Name
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        placeholder="Enter game name..."
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none"
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-orange-500 text-white py-2 rounded-lg font-semibold hover:bg-orange-600 transition"
                >
                    Create Game
                </button>
            </form>

        </div>
    </div>
</x-app>