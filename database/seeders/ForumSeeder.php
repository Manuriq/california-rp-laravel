<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => Str::random(10)
        ]);

        DB::table('forums')->insert([
            'title' => Str::random(10),
            'desc' => Str::random(10)
        ]);

        DB::table('posts')->insert([
            'title' => Str::random(10),
            'desc' => Str::random(10)
        ]);
    }
}
