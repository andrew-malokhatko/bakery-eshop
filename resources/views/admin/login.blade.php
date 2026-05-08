<x-admin-layout title="Admin log in" :showLogoutLink="false">
    <div class="auth admin-auth">
        <div class="content">
            <h1 class="name">Admin</h1>
            <h2 class="text">Log in</h2>

            <form action="{{ route('admin.login.post') }}" method="POST">
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

                <button class="log-in" type="submit">Log in</button>
            </form>

            <a class="lost-password" href="#">Lost your password?</a>
        </div>
    </div>
</x-admin-layout>
