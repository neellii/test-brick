<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Фестиваль искусств', 'Конференция по технологиям', 'Выставка современного искусства', 'Спортивные соревнования', 'Благотворительный бал', 'Кулинарный мастер-класс', 'Детский праздник', 'Виртуальная реальность: будущее', 'Мастерская по фотографии', 'Музыкальный фестиваль', 'Научная ярмарка', 'Турнир по настольным играм', 'Фестиваль экологии', 'Семинар по здоровью', 'Книжный фестиваль', 'Вечеринка в стиле 80-х', 'Фестиваль уличной еды', 'Курс по медитации', 'Выставка автомобилей', 'Театральный вечер', 'Ночь музеев', 'Космический форум', 'Креативный воркшоп', 'Гастрономический тур', 'Флешмоб в парке', 'Фестиваль традиционных ремесел', 'Поэтический слэм', 'Выставка винтажной моды', 'Конкурс молодых талантов', 'День здоровья и фитнеса', 'Тематическая ночь кино']),
            'description' => fake()->text(),
            'dateTime' => Carbon::parse(fake()->dateTimeBetween('next Monday', '+ 6 months'))->toDateTimeString(),
            'status' => '1'
        ];
    }
}
