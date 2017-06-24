<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100; $i++) {
            App\User::create([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'profile_picture' => "http://gravatar.com/avatar/" . md5(strtolower(trim($faker->email))) . "?d=monsterid",
                'bio' => $faker->text
            ]);
        }
        for ($i=0; $i < 300; $i++) {
            App\Post::create([
                'title' => $faker->title,
                'body' => $faker->realText(120),
                'category_id' => $faker->numberBetween(1, 30),
                'user_id' => $faker->numberBetween(1, 100)
            ]);
        }
        for ($i=0; $i < 30; $i++) {
            App\Category::create([
                'name' => $faker->name,
                'user_id' => $faker->numberBetween(1, 100)
            ]);
        }
        for ($i=0; $i < 450; $i++) {
            App\Comment::create([
                'comment' => $faker->realText(120),
                'user_id' => $faker->numberBetween(1, 100),
                'post_id' => $faker->numberBetween(1, 300)
            ]);
        }
        for ($i=0; $i < 500; $i++) {
            App\Like::create([
                'like' => $faker->boolean($chanceOfGettingTrue = 50),
                'user_id' => $faker->numberBetween(1, 100),
                'post_id' => $faker->numberBetween(1, 300)
            ]);
        }
        for ($i=0; $i < 1000; $i++) {
            App\Friend::create([
                'user_id_1' => $faker->numberBetween(1, 100),
                'user_id_2' => $faker->numberBetween(1, 100),
                'approved' => $faker->boolean($chanceOfGettingTrue = 50)
            ]);
        }
    }
}
