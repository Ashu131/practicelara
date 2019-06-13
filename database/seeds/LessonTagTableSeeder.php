<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Lesson;
use App\Model\Tag;

class LessonTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $lessonIds= Lesson::pluck('id');
        $tagIds= Tag::pluck('id');

        foreach (range(1,30) as  $index) {
            DB::table('lesson_tag')->insert([
                'lesson_id' =>  $faker->randomElement($lessonIds),
                'tag_id'    =>  $faker->randomElement($tagIds)
            ]);
        }
    }
}
