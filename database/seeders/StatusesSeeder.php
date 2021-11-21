<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['id' => 1, 'title' => 'New'],
            ['id' => 2, 'title' => 'Process'],
            ['id' => 3, 'title' => 'Done']
        ]);
    }
}
