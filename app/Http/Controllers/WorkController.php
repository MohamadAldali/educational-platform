<?php

namespace App\Http\Controllers;

use App\Models\work;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $id  = session('user-id');
     
        return view('dachboard.work.create',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      

        $validatedData = $request->validate([
            'name_works' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'company' => 'required',
        ]);
        $id  = session('user-id');
        $validatedData['user_id'] = $id;
        work::create($validatedData);
        return redirect()->route('user.show',$id)->with('success', 'User Created Successfully');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, work $work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $work = work::with('user')->findOrFail($id);
        $id_user=$work->user_id;
        $work->delete();

        return redirect("/user/$id_user")->with('success', 'User Deleted Successfully');

    }
}
