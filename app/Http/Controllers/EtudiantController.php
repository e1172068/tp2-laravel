<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::paginate(15);
        return view("etudiant.index", [ "etudiants" => $etudiants, "active" => "etudiant.index" ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $currentUserId = Auth::user()->id;
        $ville = Ville::getCityById($etudiant->ville_id);
        return view("etudiant.show", ["etudiant" => $etudiant, "nomVille" => $ville->nom, "active" => "show", "currentUserId" => $currentUserId]);
    }
}
