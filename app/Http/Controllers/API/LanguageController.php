<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Language = Language::all();
        return response()->json($Language, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Language Request Data:', $request->all()); // Log the request data
    
        $validatedData = $request->validate([
            'languages' => 'required|string',
            'level' => 'required|string|max:50', // Adjust max length as needed
            'c_v_s_id' => 'required|integer',
        ]);
    
        $language = Language::create($validatedData);
    
        return response()->json($language, 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Language::find($id);
        return  response()->json($emp, 201);
    }
    public function update(Request $request, string $id)
    {
        $emp = Language::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Language::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Employer est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
}
