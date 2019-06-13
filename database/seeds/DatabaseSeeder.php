<?php

use Illuminate\Database\Seeder;
use App\Model\Lesson;
// use App\Model\Tag;
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
        Tag::truncate();
        DB::table('lesson_tag')->truncate();
        
        Model::unguard();
            $this->call(LessonsTableSeeder::class);
            $this->call(TagsTableSeeder::class);
            $this->call(LessonTagTableSeeder::class);
        Model::reguard();
    }
}
