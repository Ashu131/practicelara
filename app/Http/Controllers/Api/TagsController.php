<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Acme\Transformers\TagTransformer;
use App\Model\Tag;
use App\Model\Lesson;

class TagsController extends ApiController
{
    protected $tagTransformer;
    
    public function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lessonId = null)
    {
        $tags = $this->getTags($lessonId);
        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->toArray())
        ]);
    }

    /**
     * Undocumented function
     *
     * @param int $lessonId
     * @return Response
     */
    private function getTags($lessonId)
    {
        return $tags = $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();
    }
}
