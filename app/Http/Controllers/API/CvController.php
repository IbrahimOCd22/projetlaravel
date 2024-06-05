<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CV;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = CV::all();
        return response()->json($emp, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'catagorie' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'profile' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'candidat_id' => 'required',
        ]);
    
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $path;
        }
    
        $cv = CV::create($validatedData);
    
        return response()->json($cv, 201);
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cv = CV::with('work_experiences', 'education_details', 'languages', 'expertise')->find($id);
        return response()->json($cv, 200);
    }
    public function update(Request $request, string $id)
    {
        $emp = CV::find($id);
    
        if ($request->hasFile('photo')) {
            // Handle file upload
            $photoPath = $request->file('photo')->store('photos', 'public');
            $emp->photo = $photoPath;
        }
    
        $emp->update($request->except('photo'));
        return response()->json($emp, 201);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = CV::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Employer est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
}
