<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lecture;
use Illuminate\Support\Facades\Validator;

class LectureControllerAPI extends Controller
{
    use ApiResponseTrait;

    public function index($id_co)
    {
        $lectures=lecture::all()->where('course_id',$id_co);
        if($lectures){
           
            return $this->apiResponse($lectures,'OK',200);
        }
        return $this->apiResponse(null,'data not found',401);
    }

    public function show( $id)
    {
       
        $lecture=lecture::find($id);
        if($lecture){
          
            return $this->apiResponse($lecture,'OK',200);
        }
        return $this->apiResponse(null,'data not found',401);
  
    }


    public function store(Request $request )
    {
        $validator=Validator::make($request->all(),[
        'title'=>'required',
        'discription_le'=>'required',
        'videoPath'=>'required',
        'course_id'=>'required'
        ]);
        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
 
       $lecture=lecture::create(
        $request->all()
       );

       if($lecture){
     
        return $this->apiResponse($lecture,'OK',201);
    }
    return $this->apiResponse(null,'data not save',400);

    }
    public function update(Request $request , $id)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required',
            'discription_le'=>'required',
            'videoPath'=>'required',
            'course_id'=>'required'
            ]);
        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
 
       $lecture=lecture::find($id);
       $lecture->update($request->all());

       if($lecture){
      
        return $this->apiResponse($lecture,'update',201);
    }
    return $this->apiResponse(null,'data not save',400);

    }

    

    public function destroy( $id)
    {
       
 
       $lecture=lecture::find($id);
       
       if($lecture){
        $lecture->delete($id);
        return $this->apiResponse(null,'delet',200);
    }
    return $this->apiResponse(null,'data not delet',401);

    }


}