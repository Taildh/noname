<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [];

        for ($i = 0; $i < 30; $i++) {
            $posts[] = [
                'user_id' => rand(1, 3),
                'category_id' => rand(1, 5),
                'slug' => 'bai-viet-' . $i,
                'title' => 'Bai viet ' . $i,
                'description' => '',
                'detail' => '',
                'image' => 'https://i.picsum.photos/id/814/200/200.jpg?hmac=cpUMsYdlkULqgLonFpQyNS2QBtsSI7vTX1_ew8-lS8A',
                'status' => rand(0,1),
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
