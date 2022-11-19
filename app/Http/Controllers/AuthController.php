<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("auth.index", ["active" => "login"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view("auth.create", ["villes" => $villes, "active" => "registration"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des champs 
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" =>"required|min:6|confirmed",
            "adress" => "required|string",
            "phone" => "required|string",
            "birthdate" => "required|date",
            "ville_id" => "required|int|exists:villes,id",
        ]);

        // Insertion des champs appropriés dans la table users
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password"=> Hash::make($request->password)
        ]);
        
        // Insertion des champs appropriés dans la table etudiants
        Etudiant::create([
            "user_id" => $user->id,
            "adress" => $request->adress,
            "phone" => $request->phone,
            "birthdate" => $request->birthdate,
            "ville_id" => $request->ville_id,
        ]);

        return redirect(route("user.registration"))->withSuccess(__("lang.registration_success"));
    }
    
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $currentUserId = Auth::user()->id;
        $currentUser = Auth::user();
        $currentStudent = $currentUser->findStudent($currentUserId);
        $ville = Ville::getCityById($currentStudent->ville_id);
        return view("auth.show", ["etudiant" => $currentStudent, "user" => $currentUser, "nomVille" => $ville->nom, "active" => "dashboard", "currentUserId" => $currentUserId]);
    }

    /**
     * Montre le formulaire pour modifier les renseignements d'un utilisateur-etudiant
     */
    public function edit() 
    {
        $user = Auth::user();
        $etudiant = $user->findStudent($user->id);
        $villes = Ville::all();
        return view("auth.edit", ["etudiant" => $etudiant, "user" => $user, "villes" => $villes, "active" => "dashboard"]);
    }

    /**
     * Update la base de donnée avec les nouvelles informations pour les tables User et Etudiant
     */
    public function update(Request $request)
    {
        // Validation des champs 
        $request->validate([
            "name" => "required",
            "adress" => "required|string",
            "phone" => "required|string",
            "birthdate" => "required|date",
            "ville_id" => "required|int|exists:villes,id",
        ]);

        // Insertion des champs appropriés dans la table users
        Auth::user()->update([
            "name" => $request->name,
        ]);
        

        $etudiant = Auth::user()->findStudent(Auth::user()->id);
        // Insertion des champs appropriés dans la table etudiants
        $etudiant->update([
            "user_id" => Auth::user()->id,
            "adress" => $request->adress,
            "phone" => $request->phone,
            "birthdate" => $request->birthdate,
            "ville_id" => $request->ville_id,
        ]);

        return redirect(route("dashboard"));
    }

    /**
     * Remove the current user and student from storage. 
     */
    public function destroy() {
        $user = Auth::user();
        $etudiant = $user->findStudent($user->id);

        $etudiant->delete();
        $user->delete();
        return redirect(route("home"));
    }

    /**
     * Authentification d'un utilisateur
     */
    public function authentication(Request $request)
    {
        $request->validate([
            "email" => "required|min:6"
        ]);

        $credentials = $request->only("email", "password");

        if (!Auth::validate($credentials)) {
            return redirect(route("login.index"))->withErrors(trans("auth.failed"));

        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect(route("dashboard"));
    }

    /**
     * Dashboard
     */
    public function dashboard() {
        $name = Auth::user()->name;
        
        if (Auth::check()) {
            $name = Auth::user()->name;
        }
        return view("etudiant.dashboard", ["name" => $name, "active" => ""]);
    }

    /**
     * Déconnexion d'un utilisateur
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route("login"));
    }
}


