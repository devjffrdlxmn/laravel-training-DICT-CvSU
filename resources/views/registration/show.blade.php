<x-app>

    <x-slot:title>
        Registration Account 
    </x-slot:title>
    <div>
    @if(session('success'))
        {{ session('success') }}
    @endif
    </div>  
    <h1>Create New Account</h1>
    <form action="{{ route('registration.save') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div>{{ $message }}</div>
        @enderror

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

        <label for="password">Confirm Password</label>
        <input type="password" name="password_confirmation"  value="{{ old('password_confirmation') }}" >
        @error('password_confirmation')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Save</button>
    </form>

</x-app>    