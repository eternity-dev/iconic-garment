<?php

namespace Database\Seeders;

use App\Models\Garment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $garments = Garment::all();
        $garments->each(function (Garment $garment) {
            $products = Product::factory()
                ->count(5)
                ->for($garment)
                ->hasImages(5)
                ->create();
        });
    }
}
