<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = Candidat::all();
        return response()->json($emp, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidats',
            'password' => 'required|string',
        ]);
    
        // Create a new Candidat record
        $emp = Candidat::create($validatedData);
    
        return response()->json($emp, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Candidat::find($id);
        return  response()->json($emp, 201);
    }
    public function update(Request $request, string $id)
    {
        $emp = Candidat::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Candidat::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Candidat est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $candidate = Candidat::where('email', $credentials['email'])->first();

        if ($candidate && $credentials['password'] && $candidate->password) {
            return response()->json(['status' => 'success', 'message' => 'Login successful', 'candidate' => $candidate], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
    }
}