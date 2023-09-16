<?php

namespace App\Http\Controllers;
use App\Models\course;
use App\Models\lecture;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

        $course = Session::get('course');
     
        
        $users = $course->users->where('num', 3);
        $teacher = $course->users->where('num', 2)->first();
   
        
        foreach ($users as $user) {
            $totalLectures = $user->lectures()->where('course_id', $course->id)->count();
            $attendedLectures = $user->lectures()->where('course_id', $course->id)->where('is_attend', 1)->count();
            $attendancePercentage = ($totalLectures > 0) ? ($attendedLectures / $totalLectures) * 100 : 0;
            $usersData[] = [
                'user_id' => $user->id,
                'attendance_percentage' => $attendancePercentage,
            ]; }
       
        $lectures = lecture::all()->where('course_id',$course->id);
       foreach( $lectures as  $lecture){
        $isAttend = $lecture->users->find(auth()->id());

        if ($isAttend == null) {
            $lecture->users()->attach( auth()->id(), ['is_attend' => false]);
        }
       }
        
        return view('dachboard.lecture.index', [
         'lectures' => $lectures ,
         'course'=>$course ,
         'users'=>$users ,
         'usersData'=> isset($usersData) ? $usersData : null ,
         'teacher'=> isset($teacher) ? $teacher : null ]);
   
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
    public function store(Request $request)
    {
    
        $course = Session::get('course');
        $latestLecture = Lecture::with('users')->latest('id')->where('course_id', $course->id)->first();
        

        $validatedData = $request->validate([
            'discription_le' => 'required',
            'videoPath' => 'required',
        
        ]);

        $validatedData['course_id'] = $course->id;
        if($latestLecture){
            $validatedData['num_le'] = $latestLecture->num_le + 1;
        }else{
            $validatedData['num_le'] = 1;

        }
       
        lecture::create($validatedData);

        return redirect()-> route('lecture.index');
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

    public function is_attend($id)
    {
        $lecture = lecture::findOrFail($id);

        $isAttend = $lecture->users->find(auth()->id());

        if ($isAttend !== null) {
            // يتم الوصول إلى is_attend إذا كان $isAttend غير null
            $isAttendValue = $isAttend->pivot->is_attend;

            if($isAttendValue )
            {
            
                $lecture->users()->updateExistingPivot(auth()->id(), ['is_attend' => false]);

            }else{
                 
                $lecture->users()->updateExistingPivot(auth()->id(), ['is_attend' => true]);

            }
       
        } else {
            
            $lecture->users()->attach( auth()->id(), ['is_attend' => true]);
        }

       
      
        
        return Redirect::back()->withInput();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lecture $lecture)
    {
        //
    }
}
