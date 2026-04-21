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

            @if ($errors->any())
            <div class="auth-errors">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input
                    type="email"
                    name="email"
                    class="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                >

                <input
                    type="password"
                    name="password"
                    class="password"
                    placeholder="Password"
                    required
                >

                <div class="auth-actions">
                    <button type="submit" class="auth-btn">Log in</button>
                </div>
            </form>

            <a class="lost-password" href="#">Lost your password?</a>
        </div>
    </div>
</x-layout>
