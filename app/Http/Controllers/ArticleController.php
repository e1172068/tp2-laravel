<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view("article.index", ["articles" => $articles, "active" => "forum"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("article.create", ["active" => "article_create"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "titre" => "required|string|max:100",
            "titre_en" => "required|string|max:100",
            "contenu" => "required|string",
            "contenu_en" => "required|string"
        ]);

        $article = Article::create([
            "titre" => $request->titre,
            "titre_en" => $request->titre_en,
            "contenu" => $request->contenu,
            "contenu_en" => $request->contenu_en,
            "user_id" => Auth::user()->id
        ]);

        return redirect(route("article.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("article.show", ["article" => $article, "active" => "forum"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (Auth::user()->id === $article->user_id) {
            return view("article.edit", ["article" => $article, "active" => "forum"]);
        } else {
            return redirect(route("home"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "titre" => "required|string|max:100",
            "titre_en" => "required|string|max:100",
            "contenu" => "required|string",
            "contenu_en" => "required|string"
        ]);

        $article->update([
            "titre" => $request->titre,
            "titre_en" => $request->titre_en,
            "contenu" => $request->contenu,
            "contenu_en" => $request->contenu_en,
            "user_id" => Auth::user()->id
        ]);
        return redirect(route("article.show", $article->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if (Auth::user()->id === $article->user_id) {
            $article->delete();
            return redirect(route('article.index'));
        } else {
            return redirect(route("home"));
        }
    }
}
