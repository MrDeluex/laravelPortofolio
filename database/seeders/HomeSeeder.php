<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::create([
            'name' => 'MILKI DWI PUTRA',
            'title1' => 'PORTFOLIO',
            'title2' => 'WEBSITE',
        ]);
    }
}
