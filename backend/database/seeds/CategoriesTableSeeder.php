<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            Category::create([
                'name' => $faker->catchPhrase()
            ]);
        }
    }
}
