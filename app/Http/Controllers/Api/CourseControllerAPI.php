<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResources;
use Illuminate\Http\Request;
use App\Models\course;
use Illuminate\Support\Facades\Validator;

class CourseControllerAPI extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $courses=course::get();
        if($courses){
            $co= CourseResources::collection($courses);
            return $this->apiResponse($co,'OK',200);
        }
        return $this->apiResponse(null,'data not found',401);
    }

    public function show( $id)
    {
       
        $course=course::find($id);
        if($course){
            $co= new CourseResources($course);
            return $this->apiResponse($co,'OK',200);
        }
        return $this->apiResponse(null,'data not found',401);
  
    }


    public function store(Request $request )
    {
        $validator=Validator::make($request->all(),[
            'name_courses'=>'required|max:255',
        'discription'=>'required',
        ]);
        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
 
       $course=course::create(
        $request->all()
       );

       if($course){
        $co= new CourseResources($course);
        return $this->apiResponse($co,'OK',201);
    }
    return $this->apiResponse(null,'data not save',400);

    }
    public function update(Request $request , $id)
    {
        $validator=Validator::make($request->all(),[
            'name_courses'=>'required|max:255',
        'discription'=>'required',
        ]);
        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
 
       $course=course::find($id);
       $course->update($request->all());

       if($course){
        $co= new CourseResources($course);
        return $this->apiResponse($co,'update',201);
    }
    return $this->apiResponse(null,'data not save',400);

    }

    

    public function destroy( $id)
    {
       
 
       $course=course::find($id);
       
       if($course){
        $course->delete($id);
        return $this->apiResponse(null,'delet',200);
    }
    return $this->apiResponse(null,'data not delet',401);

    }


}