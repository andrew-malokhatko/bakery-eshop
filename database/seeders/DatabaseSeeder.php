<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'),
                'is_admin' => true
            ]
        );

        $this->call([
            ProductSeeder::class,
            ImageSeeder::class,
            ProductImageSeeder::class,
            CategorySeeder::class,
            ProductCategorySeeder::class,
            TagSeeder::class,
            ProductTagSeeder::class,
        ]);
    }
}
