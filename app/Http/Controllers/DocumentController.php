<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::paginate(5);
        return view("document.index", ["documents" => $documents, "active" => "document"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("document.create", ["active" => "document"]);
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
            "document" => "mimes:pdf,zip,doc"
        ]);

        $documentPath = null;
        if ($request->hasFile("document")) {
            $documentPath = $request->file("document")->store("documents", "public");
        }

        $document = Document::create([
            "titre" => $request->titre,
            "titre_en" => $request->titre_en,
            "document_path" => $documentPath,
            "user_id" => Auth::user()->id
        ]);

        return redirect(route("document.create"))->withSuccess(__("lang.document_upload_success"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        if (Auth::user()->id == $document->user_id) {
            return view("document.edit", ["document" => $document, "active" => "document"]);
        } else {
            return redirect(route("home"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            "titre" => "required|string|max:100",
            "titre_en" => "required|string|max:100",
        ]);

        $document->update([
            "titre" => $request->titre,
            "titre_en" => $request->titre_en
        ]);

        return redirect(route("document.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if (Auth::user()->id == $document->user_id) {
            $document->delete();
            return redirect(route("document.index"));
        } else {
            return redirect(route("home"));
        }
    }
}
