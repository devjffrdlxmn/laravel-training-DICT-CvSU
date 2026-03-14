<x-app>
    <x-slot:title>
        User Not Verified
    </x-slot:title>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="max-w-md w-full bg-white shadow-lg rounded-xl p-8 text-center">

            <h1 class="text-2xl font-semibold text-gray-800 mb-2">
                Email Not Verified
            </h1>

            <p class="text-gray-600 mb-6">
                Please verify your email address before continuing.
            </p>

            @session('message')
                <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm">
                    {{ session('message') }}
                </div>
            @endsession

            <a href="{{ route('verification.send') }}"
               class="inline-block w-full bg-orange-600 hover:bg-orange-700 text-white font-medium py-2.5 px-4 rounded-lg transition duration-200">
                Resend Verification Email
            </a>

        </div>
    </div>
</x-app>