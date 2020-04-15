  
<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Comment::class, function (Faker $faker) {
    $post = App\Post::pluck('id')->toArray();
    $user = App\User::pluck('id')->toArray();
  
    
    return [
        //'post_author' => $faker->randomElement($users),
        //'post_date' => now(),
        'content'=> $faker->sentence(),
        'post_id'=> $faker->randomElement($post),
        'user_id'=> $faker->randomElement($user),
        
    ];
});