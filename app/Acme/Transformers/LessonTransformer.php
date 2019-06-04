<?php
namespace Acme\Transformers;

class LessonTransformer extends Transformer {

    /**
     * @param $lesson
     * @return array $lesson
     */
    public function transform($lesson)
    {
        return [
            'Title' =>  $lesson['title'],
            'Body'  =>  $lesson['body'],
            'active'=>  (boolean) $lesson['some_bool']
        ];
    }
}