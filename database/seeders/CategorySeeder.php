<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Культура', 'Образование', 'Спорт', 'Социальные', 'Корпорации', 'Тематика', 'Праздники', 'Экология', 'Наука', 'Технологии', 'Искусство', 'Кулинария', 'Дети', 'Музыка', 'Виртуальность','Выставки', 'Фестивали', 'Туризм', 'Здоровье', 'Литература', 'История', 'Мода', 'Фотография', 'Игры', 'Анимация', 'Космос', 'Театр', 'Медитация', 'Ремесло', 'Автомобили', 'Путешествия'];

        Category::factory(count($categories))->sequence(fn ($sequence) => ['category' => $categories[$sequence->index]])->create();
    }
}
