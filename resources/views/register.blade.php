<x-layout>
    <x-slot:title>
        Sign up
    </x-slot:title>

    <div class="auth">
        <img src="{{ asset('images/logo.png') }}" alt="Bakery Logo">
        <div class="content">
            <h1 class="name">Bakery</h1>
            <h2 class="text">Create new account</h2>
            <p class="has-account">Get more discounts as a member. <a href="#">More info</a>.</p>
            <input type="email" class="email" placeholder="Email">
            <input type="password" class="password" placeholder="Password">
            <input type="password" class="password" placeholder="Confirm password">
            <p class="has-account">Already have an account? <a href="{{ route('login') }}">Log in</a>.</p>
            <button class="log-in">Sign up</button>
        </div>
    </div>
</x-layout>