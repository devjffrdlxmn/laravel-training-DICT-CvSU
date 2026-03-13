<x-app>
<x-slot:title>
   Guest Word Login
</x-slot:title>

<div class="min-h-screen flex items-center justify-center bg-slate-100">

<div class="w-full max-w-sm bg-white rounded-lg p-6 shadow-sm">

    <h1 class="text-3xl font-bold text-center mb-1">
        📝 Word Guest
    </h1>

    <p class="text-center text-gray-500 text-sm mb-6">
        Log in to start playing
    </p>

    <form method="POST" action="{{ route('auth.login') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <input
                type="text"
                name="name"
                placeholder="Name"
                value="{{ old('name') }}"
                required
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >

            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <input
                type="password"
                name="password"
                placeholder="Password"
                required
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >

            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Login Button -->
        <button
            type="submit"
            class="w-full bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-700"
        >
            Play Game
        </button>

        <!-- Divider -->
        <div class="flex items-center gap-2">
            <hr class="flex-1">
            <span class="text-xs text-gray-400">or</span>
            <hr class="flex-1">
        </div>

        <!-- Google Login -->
        <a href="{{ route('oauth.show') }}"
           class="flex items-center justify-center gap-2 border rounded-md py-2 hover:bg-gray-50 text-sm">

            <svg class="w-4 h-4" viewBox="0 0 48 48">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.69 1.22 9.19 3.61l6.85-6.85C35.91 2.24 30.35 0 24 0 14.82 0 6.86 5.29 2.88 13l7.98 6.2C12.66 13.09 17.87 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.1 24.5c0-1.64-.15-3.21-.42-4.73H24v9h12.4c-.53 2.85-2.15 5.27-4.57 6.89l7.01 5.44C43.94 37.03 46.1 31.24 46.1 24.5z"/>
                <path fill="#FBBC05" d="M10.86 28.7A14.48 14.48 0 019.5 24c0-1.64.29-3.21.8-4.7l-7.98-6.2A23.93 23.93 0 000 24c0 3.77.9 7.34 2.5 10.5l8.36-5.8z"/>
                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.14 15.9-5.82l-7.01-5.44c-1.95 1.31-4.45 2.09-8.89 2.09-6.13 0-11.34-3.59-13.14-8.7l-8.36 5.8C6.86 42.71 14.82 48 24 48z"/>
            </svg>

            Login with Google
        </a>

        <!-- OAuth Error -->
        @error('oauth')
            <p class="text-red-500 text-xs text-center">{{ $message }}</p>
        @enderror

        <!-- Register -->
        <p class="text-center text-xs text-gray-500 pt-2">
            New player?
            <a href="{{ route('registration.show') }}"
               class="text-orange-500 hover:underline">
                Create account
            </a>
        </p>

    </form>

</div>


</div>
</x-app>
