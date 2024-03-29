<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
