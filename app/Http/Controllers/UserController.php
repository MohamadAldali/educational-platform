<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
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
        $users = User::all();
       return view('dachboard.users.index', [
        'users' => $users
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        return view('dachboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'num'=>'required'
        ]);
     
        User::create($validatedData);
        return redirect()->route('user.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        if( Auth::user()->id ==  $id || Auth::user()->num == 1){
            //يجب جلب باقي التفاصيل
        $user = User::findOrFail($id);
        return view('dachboard.users.show', [
            'user' => $user
        ]);
        }
        return abort(403, 'ليس لديك إذن للوصول إلى هذا المورد.');
        
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        if( Auth::user()->id ==  $id || Auth::user()->num == 1){
            $user = User::findOrFail($id);
            return view('dachboard.users.edit', [
                'user' => $user
            ]);
        }
         return abort(403, 'ليس لديك إذن للوصول إلى هذا المورد.');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'min:2',
            'email' => 'email|unique:users,email,' . $user->id,
            'num'=>'required',
          
        ]);

        if ($request['password'] == null) {
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'num' => $validatedData['num']
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => 'min:2',
                'email' => 'email|unique:users,email,' . $user->id,
                'num'=>'required',
                'password' =>'required'
            ]);
            $user->update($validatedData);
        }

        return redirect()->route('user.show',$user->id)->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User Deleted Successfully');
    }
    public function storeImage(Request $request , $id){
        $user = User::findOrFail($id);
        
        if($request->file('photo') == null){
            return redirect()->route('user.show',$user->id)->with('success', 'User Created Successfully');
        }
        $path =$request->file('photo')->store('users','img');
        $user ->update([
            'image'=>$path
           ]);
       
        return redirect()->route('user.show',$user->id)->with('success', 'User Created Successfully');
    }
    public function destroyImage($id){
        $user = User::findOrFail($id);
        $user ->update([
            'image'=>null
           ]);
           return redirect()->route('user.show',$user->id)->with('success', 'User Created Successfully');
        }

  
}
