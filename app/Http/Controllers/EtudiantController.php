<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etudiant;

class EtudiantController extends Controller
{
    public function index()
    {
        // All Product
        $etudiant = etudiant::all();

        // Return Json Response
        return response()->json([
            'etudiant' => $etudiant
        ], 200);
    }

    public function store(Request $request)
    {
        try {

            // Create Product
            etudiant::create([
                'Fname' => $request->Fname,
                'Lname' => $request->Lname,
                'sex' => $request->sex,
                'classe' => $request->classe
            ]);

            // Return Json Response
            return response()->json([
                'message' => "etudiant successfully created."
            ], 200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }
}
