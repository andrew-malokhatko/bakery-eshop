<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>

    <div class="auth">
        <img src="{{asset('images/logo.png')}}" alt="Bakery Logo">
        <div class="content">
            <h1 class="name">Bakery</h1>
            <h2 class="text">Welcome Back!</h2>
            <p class="has-account">Don't already have an account? <a href="{{ route('register') }}">Sign up</a>.</p>
            <input type="email" class="email" placeholder="Email">
            <input type="password" class="password" placeholder="Password">
            <button class="log-in">Log in</button>
            <a class="lost-password" href="#">Lost your password?</a>
        </div>
    </div>
</x-layout>