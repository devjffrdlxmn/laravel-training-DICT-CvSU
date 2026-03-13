<x-app>
<x-slot:title>
    Create Player Account
</x-slot:title>

<div class="min-h-screen flex items-center justify-center bg-gray-100">
<div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Create Player Account
    </h2>

    @if(session('success'))
    <div class="text-green-600 text-sm text-center mb-4">
        New Account Created!
    </div>
    @endif

    <form method="post" action="{{ route('registration.save') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                Player Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                
                value="{{ old('name') }}"
                class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >

            <p class="text-xs text-gray-500 mt-1">
                Must be letters, numbers, - and _
            </p>

            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email
            </label>

            <input
                type="email"
                name="email"
                id="email"
                
                value="{{ old('email') }}"
                class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >

            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
                Password
            </label>

            <input
                type="password"
                name="password"
                id="password"
                
                class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >

            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                Confirm Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                
                class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >

            @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-700 transition font-medium"
        >
            Create Account
        </button>
        
        <p class="text-center text-sm text-gray-600 mt-4">
            Already have an account?
            <a href="{{ route('login') }}"
               class="text-orange-600 font-semibold hover:underline">
               Login
            </a>
        </p>

    </form>

</div>
</div>

</x-app>
