<x-admin-layout title="Admin log out" :showLogoutLink="false">
    <div class="admin-logout">
        <div class="content">
            <h1 class="name">Log out?</h1>
            <p>Are you sure you want to log out?</p>
            <button class="log-out">Log out</button>
            <a class="cancel" href="{{ route('admin.products.index') }}">Cancel</a>
        </div>
    </div>
</x-admin-layout>