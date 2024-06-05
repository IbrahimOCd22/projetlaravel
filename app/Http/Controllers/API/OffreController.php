<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offre = Offre::all();
        return response()->json($offre, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
  
     public function store(Request $request)
     {
         // Ajouter la validation des données
         $validator = Validator::make($request->all(), [
             'poste' => 'required|string|max:255',
             'salary' => 'required|numeric',
             'description' => 'required|string',
             'categorie' => 'required|string|max:255',
             'message' => 'nullable|string',
             'employer_id' => 'required|exists:employers,id'
         ]);
     
         if ($validator->fails()) {
             return response()->json(['error' => $validator->errors()], 400);
         }
     
         try {
             $offre = Offre::create($request->all());
             return response()->json($offre, 201);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
         }
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offre = Offre::with('employer')->find($id);
        return response()->json($offre, 200);
    }
    public function update(Request $request, string $id)
    {
        $emp = Offre::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Offre::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Employer est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
}
