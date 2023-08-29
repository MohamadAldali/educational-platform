<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'password' => 'required|min:8|max:20',
            'num'=>'required'
        ]);
        User::create($validatedData);
        return redirect()->route('user.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //يجب جلب باقي التفاصيل
        $user = User::findOrFail($id);
        return view('dachboard.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('dachboard.users.edit', [
            'user' => $user
        ]);
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
            'password' => ['nullable' , Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()]
        ]);

        if ($request['password'] == null) {
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'num' => $validatedData['num']
            ]);
        } else {
            $user->update($validatedData);
        }

        return redirect()->route('user.index')->with('success', 'User Updated Successfully');
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
}
