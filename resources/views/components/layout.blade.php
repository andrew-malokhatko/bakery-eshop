<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Bakery' : 'Bakery' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="site-wrapper">
<header class="header">
    <a class="logo" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Bakery Logo">
    </a>

    <nav class="header-links">
        <a href="{{ url('/shop') }}">Shop</a>
        <a href="{{ url('/#review') }}">About</a>
        <a href="{{ url('/contact') }}">Contact</a>
    </nav>

    <div class="header-actions">
        <a class="cart" href="{{ url('/cart') }}" aria-label="Cart">
            <img src="{{ asset('images/shopping-cart.png') }}" alt="Cart">
        </a>

        @guest
        <a class="login" href="{{ route('login') }}">Log in</a>
        <a class="login" href="{{ route('register') }}">Sign up</a>
        @endguest

        @auth
        <span class="login">
        Hi, {{ Auth::user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="login">Log out</button>
        </form>
        @endauth
    </div>
</header>

<main class="flex-1 container mx-auto px-4 py-8">
    {{ $slot }}
</main>

<footer class="footer">
    <div class="social">
        <a href="#" aria-label="Instagram">
            <img src="{{ asset('images/instagram.svg') }}" alt="" class="icon" />
        </a>
        <a href="#" aria-label="Facebook">
            <img src="{{ asset('images/facebook.svg') }}" alt="" class="icon" />
        </a>
        <a href="#" aria-label="TikTok">
            <img src="{{ asset('images/tiktok.svg') }}" alt="" class="icon" />
        </a>
    </div>

    <div class="links">
        <a href="{{ url('/contact') }}">Contact</a>
        <a href="#">Terms &amp; Conditions</a>
        <a href="#">Delivery</a>
        <a href="#">Payment</a>
    </div>

    <img src="{{ asset('images/logo.png') }}" alt="Bakery Logo">
</footer>
</body>

</html>
