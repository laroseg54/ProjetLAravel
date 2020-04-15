<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 100)->create(); 
        $ids = App\Comment::pluck('id')->toArray();
        for ($i = 0; $i < 200; ++$i) {
            $id= array_rand($ids);
        factory(App\Comment::class)->create([
            'parent_id' => $id,
         
        ]);
        }
    }
}