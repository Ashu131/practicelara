<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Model\Lesson;
use Acme\Transformers\LessonTransformer;

class LessonsController extends ApiController
{
    /**
     * @var \Acme\Transformers\LessonTransformer
     */
    protected $lessonTransformer;

    /**
     * @param \Acme\Transformers\LessonTransformer|$lessonTransformer
     * @return LessonTransformer
     */
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->middleware('auth.basic',['only'=>'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All() is bad
        // NO way to signal headers response code
        $lessons= Lesson::all();
        return $this->respond([
            'data'  => $this->lessonTransformer->transformCollection($lessons->all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has('title') || !$request->has('body')) {
            return $this->setStatusCode(422)->respondWithError('Parameters failed exception');
        }

        Lesson::create($request->all());

        return $this->respondCreated('Lesson Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson= Lesson::find($id);
        if (!$lesson) {
            return $this->respondNotFound('Lesson does not exist.');
        }

        return $this->respond([
            'data'  =>$this->lessonTransformer->transform($lesson)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
