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

                @error('email')
                <p style="color:red;">{{ $message }}</p>
                @enderror

                <button class="log-in" type="submit">Log in</button>
            </form>

            <a class="lost-password" href="#">Lost your password?</a>
        </div>
    </div>
</x-admin-layout>
