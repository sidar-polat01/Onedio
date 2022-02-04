<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seederları ayrı ayrı alabilmek için.
        $this->call([
            UserSeeder::class,
           QuizSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            ResaultSeeder::class
        ]);
    }
}
