<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;



class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorieën.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['naam' => 'required|string|max:255']);
        Categorie::create(['naam' => $request->naam]);
        $categorieën = Categorie::all();
        
        return redirect()->route('faqs.create')->with('status', 'Categorie succesvol aangemaakt!');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 
    }
}
