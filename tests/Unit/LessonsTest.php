<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use App\Model\Lesson;
use Tests\TestCase;

class LessonsTest extends TestCase
{
    use WithFaker;

    protected $times = 1;
    /**
     * Lessons test
     * @test
     *
     * @return void
     */
    public function it_fetches_lessons()
    {
        // Arrange
        $this->makeLesson();
        // Act
        $response= $this->getJson('api/v1/lessons');
        // Assert
        $response->assertOk();
    }

    /**
     * @test
     *
     * @return response
     */
    public function it_fetches_a_single_lesson()
    {
        $this->makeLesson();
        $lesson = $this->getJson('api/v1/lessons/1');

        $lesson->assertOk();

        $lesson->assertJsonStructure([
            'data'=> [
                'title',
                'body',
                'active'
            ]
        ]);
    }

    /**
     * @test
     */
    public function it_404_if_a_lesson_is_not_found()
    {
        $response = $this->getJson('api/v1/lessons/x');
        $response->assertNotFound();
    }

    public function makeLesson($lessonFields = [])
    {
        $lesson = array_merge([
            'title'     =>  $this->faker->sentence,
            'body'      =>  $this->faker->text,
            'some_bool' =>  $this->faker->boolean
        ],$lessonFields);
        
        while($this->times--) Lesson::create($lesson);
    }

    private function times($count)
    {
        $this->times = $count;
        return $this;
    }
}
