<x-layout>
    <x-slot:title>
        Sign up
    </x-slot:title>

    <div class="auth">
        <img src="{{ asset('images/logo.png') }}" alt="Bakery Logo">

        <div class="content">
            <h1 class="name">Bakery</h1>
            <h2 class="text">Create new account</h2>
            <p class="has-account">
                Get more discounts as a member.
                <a href="#">More info</a>.
            </p>

            @if ($errors->any())
            <div class="auth-errors">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input
                    type="text"
                    name="name"
                    class="email"
                    placeholder="Name"
                    value="{{ old('name') }}"
                    required
                >

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

                <input
                    type="password"
                    name="password_confirmation"
                    class="password"
                    placeholder="Confirm password"
                    required
                >

                <p class="has-account">
                    Already have an account?
                    <a href="{{ route('login') }}">Log in</a>.
                </p>

                <button type="submit" class="log-in">Sign up</button>
            </form>
        </div>
    </div>
</x-layout>
