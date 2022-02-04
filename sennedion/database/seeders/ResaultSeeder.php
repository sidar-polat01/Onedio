<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Result::factory(20)->create();
    }
}
