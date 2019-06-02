<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lesson;

class LessonsController extends Controller
{
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
        return response()->json([
            'data'  => $this->transformCollection($lessons)
        ], 200);
    }

    private function transformCollection($lessons)
    {
        return array_map([$this,'transform'], $lessons->toArray());
    }

    private function transform($lesson)
    {
        return [
            'Title' =>  $lesson['title'],
            'Body'  =>  $lesson['body'],
            'active'=>  (boolean) $lesson['some_bool']
        ];
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
        //
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
            return response()->json([
                'error' =>'Lesson not found.'
            ], 404);
        }

        return response()->json([
            'data'  =>$this->transform($lesson)
        ], 200);
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
