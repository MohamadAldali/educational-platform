<?php

namespace App\Http\Controllers;
use App\Models\course;
use App\Models\lecture;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
     
    public function index()
    {
        
         $course=session('course');
       
        $lectures = lecture::all()->where('course_id',$course->id);
        return view('dachboard.lecture.index', [
         'lectures' => $lectures  ]);
   
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create( )
    {
       
        return view('dachboard.lecture.create');
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,course $course)
    {
    

        $validatedData = $request->validate([
            'number' => 'required',
            'discription_le' => 'required',
            'videoPath' => 'required',
            'course_id' =>  $course->id,
      
        ]);
        course::create($validatedData);
        return redirect()->route('course.index')->with('success', 'User Created Successfully');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lecture $lecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lecture $lecture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lecture $lecture)
    {
        //
    }
}
