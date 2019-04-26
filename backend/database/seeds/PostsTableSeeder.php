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
        $category = Category::create([
            'name' => 'faker'
        ]);
        $tag = Tag::create([
            'name' => 'faker'
        ]);

        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\en_US\Text($faker));
        foreach (range(1, 100) as $index) {
            $post = Post::create([
                'title' => $faker->realText(140, 2),
                'description' => $faker->realText(300, 2),
                'content' => 
                    $faker->realText(400, 2) . "\n" . $faker->realText(400, 2) . "\n" . $faker->realText(400, 2),
                'category_id' => $category->id,
                'image' => 'posts/default.png'
            ]);
            $post->tags()->attach([$tag->id]);
        }
    }
}
