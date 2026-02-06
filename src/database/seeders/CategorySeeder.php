<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Дом и интерьер',
            'Строительство',
            'Недвижимость',
            'Электроника',
            'Культура',
            'Одежда',
            'Книги',
            'Спорт',
            'Авто',
            'Игры',
        ];

        foreach ($categories as $category) {

            Category::query()->updateOrCreate(

                ['name' => $category],
                ['slug' => Str::slug($category)]

            );
        }
    }
}
