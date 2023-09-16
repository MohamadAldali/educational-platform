<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
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
     
        return view('dachboard.certificates.create',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
      
         $validatedData = $request->validate([
            'name_cert' => 'required',
            'date' => 'required',
            'donor' => 'required',
        ]);
        $id  = session('user-id');
        $validatedData['user_id'] = $id;
        certificate::create($validatedData);
        return redirect()->route('user.show',$id)->with('success', 'User Created Successfully');
   
     }
 
     /**
      * Display the specified resource.
      */
     public function show(certificate $certificate)
     {
         //
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(certificate $certificate)
     {
         //
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, certificate $certificate)
     {
         //
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         $certificate = certificate::with('user')->findOrFail($id);
         $id_user=$certificate->user_id;
         $certificate->delete();
 
         return redirect("/user/$id_user")->with('success', 'User Deleted Successfully');
 
     }
}
