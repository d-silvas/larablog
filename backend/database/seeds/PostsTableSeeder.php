<?php

use Illuminate\Database\Seeder;

use App\Tag;
use App\Post;
use App\Category;
use Faker\Factory as Faker;
use App\User;

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
        $userIds = User::all()->pluck('id')->toArray();

        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\en_US\Text($faker));
        for ($i = 0; $i < 100; $i++) {
            $title = $faker->realText(70, 2);
            $post = Post::create([
                'title' => $title,
                'slug' => str_slug($title, '-'),
                'description' => $faker->realText(300, 2),
                'content' => 
                    $faker->realText(400, 2) . "\n" . $faker->realText(400, 2) . "\n" . $faker->realText(400, 2),
                'image' => 'posts/default.png',
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoriesIds),
                'published_at' => $faker->dateTimeBetween('-10 years', '+10 years', null) 
            ]);
            for ($j = 0; $j < random_int(1, 15); $j++) {
                $post->tags()->attach($faker->randomElement($tagsIds));
            }
        }
    }
}
