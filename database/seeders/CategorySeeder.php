<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Elektronik', 'description' => 'AC, Kipas Angin, Lampu, dll']);
        Category::create(['name' => 'Furniture', 'description' => 'Kasur, Lemari, Meja, Kursi']);
    }
}
