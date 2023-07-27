<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nama' => 'Buah',
        ]);
        Category::create([
            'nama' => 'Sayur',
        ]);
        Category::create([
            'nama' => 'Daging',
        ]);
        Category::create([
            'nama' => 'Rempah rempah',
        ]);
    }
}
