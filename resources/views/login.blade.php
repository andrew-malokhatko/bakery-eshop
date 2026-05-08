<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>

    <div class="auth">
        <img src="{{ asset('images/logo.png') }}" alt="Bakery Logo">

        <div class="content">
            <h1 class="name">Bakery</h1>
            <h2 class="text">Welcome Back!</h2>
            <p class="auth-switch-text">
                Don't already have an account?
                <a href="{{ route('register') }}" class="auth-switch-link">Sign up</a>
            </p>

            <form class="flex flex-col mt-4" method="POST" action="{{ route('login') }}">
                @csrf

                <input
                    type="email"
                    name="email"
                    class="email @error('email') is-invalid @enderror"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                >

                @error('email')
                <p class="auth-field-error">{{ $message }}</p>
                @enderror

                <input
                    type="password"
                    name="password"
                    class="password @error('password') is-invalid @enderror"
                    placeholder="Password"
                    required
                >

                @error('password')
                <p class="auth-field-error">{{ $message }}</p>
                @enderror

                <div class="auth-actions">
                    <button type="submit" class="auth-btn">Log in</button>
                </div>
            </form>

            <a class="lost-password" href="#">Lost your password?</a>
        </div>
    </div>
</x-layout>
