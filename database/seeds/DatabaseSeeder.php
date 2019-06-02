<?php

use Illuminate\Database\Seeder;
use App\Model\Lesson;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Lesson::truncate();
        
        Model::unguard();
            $this->call(LessonsTableSeeder::class);
        Model::reguard();
    }
}
