<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Expertise Request Data:', $request->all()); // Log the request data
    
        $validatedData = $request->validate([
            'expertise' => 'required|string',
            'level' => 'required|string|max:50', // Adjust max length as needed
            'c_v_s_id' => 'required|integer',
        ]);
    
        $expertise = Expertise::create($validatedData);
    
        return response()->json($expertise, 201);
    }
    
    

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Expertise::find($id);
        return  response()->json($emp, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $emp = Expertise::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Expertise::find($id);

        if ($emp == null) { 
            return response()->json(['message' => 'Expertise not found'], 404);        
        } 
        $emp->delete();
        return response()->json();
    }
}
