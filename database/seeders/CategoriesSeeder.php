<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'スクール・資格',
            ]);
        Category::create([
            'name'=>'仕事',
            ]);
        Category::create([
            'name'=>'就職',
            ]);
        Category::create([
            'name'=>'転職',
            ]);
        Category::create([
            'name'=>'婚活',
            ]);
        Category::create([
            'name'=>'妊娠',
            ]);
        Category::create([
            'name'=>'出産',
            ]);
        Category::create([
            'name'=>'子育て',
            ]);
        Category::create([
            'name'=>'離婚',
            ]);
        Category::create([
            'name'=>'住宅購入',
            ]);
        Category::create([
            'name'=>'リフォーム',
            ]);
        Category::create([
            'name'=>'副業',
            ]);
        Category::create([
            'name'=>'趣味',
            ]);
        Category::create([
            'name'=>'投資',
            ]);
        Category::create([
            'name'=>'',
            ]);
    }
}
