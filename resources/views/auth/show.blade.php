<x-app>

    <x-slot:title>
        Login
    </x-slot:title>
    <div>
    @if(session('success'))
        {{ session('success') }}
    @endif
    </div>  
    <h1>LOGIN</h1>
    <form action="{{ route('auth.login') }}" method="post">
        @csrf
       
        <label for="email">Email</label>
        <input type="email" name="email"  value="{{ old('email') }}">
        @error('email')
            <div>{{ $message }}</div>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password"  value="{{ old(key: 'password') }}">
        @error('password')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Login</button>
    </form>

</x-app>    