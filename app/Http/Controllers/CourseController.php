<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Http\Controllers\Controller;
use App\Models\lecture;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('dachboard.courses.index', [
         'courses' => $courses
     ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dachboard.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'name_courses' => 'required|unique:courses',
            'discription' => 'required',
      
        ]);
        course::create($validatedData);
        return redirect()->route('course.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(course $course)
    {
    
       
        return redirect()-> route('lecture.index')->with('course', $course);
  
         
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        //
    }
}
