<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Demende;
use Illuminate\Http\Request;

class DemendeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demende::with('candidat.cv')->get();
        return response()->json($demandes);
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp = Demende::create(
            $request->all()
        );
        return  response()->json($emp, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Demende::find($id);
        return  response()->json($emp, 201);
    }
    public function update(Request $request, string $id)
    {
        $emp = Demende::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Demende::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Employer est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
}
