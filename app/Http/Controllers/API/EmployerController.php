<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Employer = Employer::all();
        return response()->json($Employer, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nvEmployer = Employer::create(
            $request->all()
        );
        return  response()->json($nvEmployer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Employer::find($id);
        return  response()->json($emp, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $emp = Employer::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Employer::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Employer est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $employer = Employer::where('email', $credentials['email'])->first();

        if ($employer && $credentials['password'] && $employer->password) {
            return response()->json(['status' => 'success', 'message' => 'Login successful', 'employer' => $employer], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
    }
}
