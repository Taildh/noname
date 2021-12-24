<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =  [
            [
                'name' => 'Danh muc 1',
                'slug' => 'danh-muc-1'
            ],
            [
                'name' => 'Danh muc 2',
                'slug' => 'danh-muc-2'
            ],
            [
                'name' => 'Danh muc 3',
                'slug' => 'danh-muc-3'
            ],
            [
                'name' => 'Danh muc 4',
                'slug' => 'danh-muc-4'
            ],
            [
                'name' => 'Danh muc 5',
                'slug' => 'danh-muc-5'
            ],

        ];

        DB::table('categories')->insert($categories);
    }
}
