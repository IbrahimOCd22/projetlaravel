<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Education_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class education_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = Education_detail::all();
        return response()->json($emp, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all()); // Log the request data
    
        $validatedData = $request->validate([
            'school'=>'required',
            'subje' => 'required|string',
            'startdate' => 'required|date_format:Y-m-d',
            'enddate' => 'required|date_format:Y-m-d',
            'description' => 'nullable|string',
            'c_v_s_id' => 'required|integer',
        ]);
    
        $educationDetail = Education_detail::create($validatedData);
    
        return response()->json($educationDetail, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Education_detail::find($id);
        return  response()->json($emp, 201);
    }
    public function update(Request $request, string $id)
    {
        $emp = Education_detail::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Education_detail::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Employer est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
}