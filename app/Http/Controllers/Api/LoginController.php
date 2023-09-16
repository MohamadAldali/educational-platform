<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function login(Request $request){
    $user =User::Where('email',$request->email)->first();
    if(!Hash::check($request->password,$user->password)){
        return 'cant login';
 
   }
  $token = $user->createToken($user->name);
  return response()->json(['token'=>$token->plainTextToken ,'user'=> $user]);
 }
}
