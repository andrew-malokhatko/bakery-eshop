@props([
    'title' => 'Admin',
    'showLogoutLink' => true,
])

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
    <header class="header admin-header">
        <a class="logo" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Bakery Logo">
        </a>
        @if ($showLogoutLink)
            <a class="admin-logout-link" href="{{ route('admin.logout') }}">Logout</a>
        @endif
    </header>

    <main>
        {{ $slot }}
    </main>
</body>

</html>