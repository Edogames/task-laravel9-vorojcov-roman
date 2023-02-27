<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class todosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) {
            DB::table('todos')->insert([
                'fromuser' => mt_rand(1, 10),
                'targetuser' => mt_rand(1, 10),
                'content' => Str::random(10),
                'status' => mt_rand(1, 3),
            ]);
        }
    }
}
