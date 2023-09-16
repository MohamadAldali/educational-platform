<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Http\Controllers\Controller;
use App\Models\lecture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $user = Auth::user(); // المستخدم الحالي

        if(!($user->num == 1)){
            $courses = $user->courses()->get();
        
            return view('dachboard.courses.index', [
                'courses' => $courses,
            ]);
        }
       
     
        $courses = Course::with(['users' => function ($query) {
            $query->where('num', 2);
        }])
        ->get();
       
        
        return view('dachboard.courses.index', [
         'courses' => $courses,
     ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('num', 2)->get();
        return view('dachboard.courses.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'name_courses' => 'required|unique:courses',
            'discription' => 'required',
            'userID'=> 'required',
      
        ]);
        $course = Course::create([
            'name_courses' => $validatedData['name_courses'],
            'discription' => $validatedData['discription'],
        ]);
    
   
        $user = User::find($validatedData['userID']);
        $course->users()->attach($user);
    
        return redirect()->route('course.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(course $course)
    {
    
        Session::put('course', $course);
        
      
        return redirect()-> route('lecture.index');
  
         
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $course = course::findOrFail($id);
        return view('dachboard.courses.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = course::findOrFail($id);
        $validatedData = $request->validate([
            'name_courses' => 'min:2',
            'discription' => 'min:2' ,
        ]);
        $course->update($validatedData);
        return redirect()->route('course.index')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = course::findOrFail($id);
        $course->delete();

        return redirect()->route('course.index')->with('success', 'User Deleted Successfully');
    }


    public function saveAddUser(Request $request,$id_co)
    {
       
        $selectedNamesArray = json_decode($request->input('selected_names_array'), true);
       
        $courseId = $id_co; 
        $userIds = $selectedNamesArray;
        
        $course = Course::find($courseId);
        $course->users()->attach($userIds);
        

        Session::put('course', $course);
        
      
        return redirect()-> route('lecture.index');
  
    }
    public function saveDeleteUser(Request $request,$id_co)
    {
       
        $userId = $request->input('user_id');
        $courseId = $id_co; 
       
        
        $course = Course::find($courseId);
        $course->users()->detach($userId);
        
        Session::put('course', $course);
        
      
        return redirect()-> route('lecture.index');
    }
    public function showAddUser($id_co)
    {
     
        $courseId = $id_co; 

       $studentsNotRegistered = User::whereDoesntHave('courses', function ($query) use ($courseId) {  
       $query->where('course_id', $courseId);
        })->where('num', 3)->select('id', 'name')->get();
     
       
        return view('dachboard.lecture.adduser', ['namesNOT' => $studentsNotRegistered,'id_co'=>$id_co]);


    }
   
    public function ubdate_marck(Request $request){

       
        $courseID = $request->input('courseID');
    $userID = $request->input('userID');
    $newMarkValue = $request->input('newMarkValue');

        $course = Course::find($courseID);
        $course->users()->updateExistingPivot($userID, ['mark' => $newMarkValue]);
     
        Session::put('course', $course);
        
      
        return redirect()-> route('lecture.index');
    }
}
