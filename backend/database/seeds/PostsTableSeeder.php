<?php

use Illuminate\Database\Seeder;

use App\Tag;
use App\Post;
use App\Category;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesIds = Category::all()->pluck('id')->toArray();
        $tagsIds = Tag::all()->pluck('id')->toArray();

        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\en_US\Text($faker));
        for ($i = 0; $i < 100; $i++) {
            $post = Post::create([
                'title' => $faker->realText(140, 2),
                'description' => $faker->realText(300, 2),
                'content' => 
                    $faker->realText(400, 2) . "\n" . $faker->realText(400, 2) . "\n" . $faker->realText(400, 2),
                'category_id' => $faker->randomElement($categoriesIds),
                'image' => 'posts/default.png'
            ]);
            for ($j = 0; $j < random_int(1, 15); $j++) {
                $post->tags()->attach($faker->randomElement($tagsIds));
            }
        }
    }
}
