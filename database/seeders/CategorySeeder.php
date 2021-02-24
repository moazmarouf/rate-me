<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'المطاعم',
            'user_id' => 1,
        ]);
        Category::create([
            'name' => 'الصيدليات',
            'user_id' => 1,
        ]);
        Category::create([
            'name' => 'الكافيهات',
            'user_id' => 1,
        ]);
        Category::create([
            'name' => 'سوبر ماركت',
            'user_id' => 1,
        ]);
    }
}
