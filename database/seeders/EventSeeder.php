<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        Event::factory(30)->create()->each(function($event) use ($users, $categories) {
            $event->users()->attach($users->random(10));
            $event->categories()->attach($categories->random(3));
        });
    }
}
