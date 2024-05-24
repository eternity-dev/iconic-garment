<?php

namespace Database\Seeders;

use App\Models\Garment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GarmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $garments = Garment::factory()->count(5)->hasAddress(1)->create();
    }
}
