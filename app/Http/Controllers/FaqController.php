<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Categorie;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorieën = Categorie::with('faqs')->get();

        return view('faqs.index', compact('categorieën'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorieën = Categorie::all();
        return view('faqs.create', compact('categorieën'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie_id' => 'required|exists:categorieën,id',
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('faqs.create')->with('status', 'FAQ succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
    }
}
