<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(\App\User::class, 50)->create();  
       factory(App\User::class, 20)->create(['role_id' => 2])->each(function ($user) {
        //$user->posts()->save(factory(App\Post::class)->create());
        factory(App\Post::class, 5)->create(['user_id' => $user->id]);
    });

    factory(App\User::class, 1)->create(['role_id' => 1])->each(function ($user) {
        //$user->posts()->save(factory(App\Post::class)->create());
        factory(App\Post::class, 2)->create(['user_id' => $user->id]);
    });

    }
}