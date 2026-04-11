<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'url' => '/images/apple-pie.jpg',
                'alt_text' => 'Apple pie',
            ],
            [
                'url' => '/images/baguette.jpg',
                'alt_text' => 'Baguette',
            ],
            [
                'url' => '/images/blueberrie-muffin.jpg',
                'alt_text' => 'Blueberry muffin',
            ],
            [
                'url' => '/images/bread1.jpg',
                'alt_text' => 'Country bread loaf',
            ],
            [
                'url' => '/images/chocolate-cake.jpg',
                'alt_text' => 'Chocolate cake',
            ],
            [
                'url' => '/images/chocolate-roll.jpg',
                'alt_text' => 'Chocolate roll',
            ],
            [
                'url' => '/images/cinnamon-bun.jpg',
                'alt_text' => 'Cinnamon bun',
            ],
            [
                'url' => '/images/cookies-box.jpg',
                'alt_text' => 'Cookies box',
            ],
            [
                'url' => '/images/croissant.jpg',
                'alt_text' => 'Croissant',
            ],
            [
                'url' => '/images/donut.jpg',
                'alt_text' => 'Donut',
            ],
            [
                'url' => '/images/sourdough-bread.jpg',
                'alt_text' => 'Sourdough bread',
            ],
            [
                'url' => '/images/strawberry-tart.jpg',
                'alt_text' => 'Strawberry tart',
            ],
            [
                'url' => '/images/vanilla-cupcake.jpg',
                'alt_text' => 'Vanilla cupcake',
            ],
        ];

        DB::table('images')->insert($images);
    }
}
