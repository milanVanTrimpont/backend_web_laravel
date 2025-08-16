<?php

namespace App\Http\Controllers;

use App\Models\KledingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class KledingItemController extends Controller
{
    public function index()
    {
        $kledingItems = KledingItem::orderBy('created_at', 'desc')->get();
        return view('kleding.index', compact('kledingItems'));
    }

    public function show($id)
{
    $kledingItem = KledingItem::with('comments.user')->findOrFail($id); 
    return view('kleding.show', compact('kledingItem'));
}

    public function admin()
    {
        $kledingItems = KledingItem::orderBy('created_at', 'desc')->get();
        return view('kleding.bewerking', compact('kledingItems'));
    }

    public function edit(KledingItem $kledingItem)
    {
        
        return view('kleding.bewerking.edit', compact('kledingItem'));
    }

    public function update(Request $request, KledingItem $kledingItem)
    {

        $validated = $request->validate([
            'titel' => 'required|max:255',
            'content' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('kleding', 'public');
            info('Foto opgeslagen:', ['path' => $validated['foto']]);
        }
    
        $updated = $kledingItem->update($validated);
    
        return redirect()->route('kleding.bewerking')->with('success', 'kledingartikel bijgewerkt!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $kledingItem = new KledingItem();
        $kledingItem->titel = $validated['titel'];
        $kledingItem->content = $validated['content'];

        if ($request->hasFile('foto')) {
            $kledingItem->foto = $request->file('foto')->store('kleding_fotos', 'public');
        }

        $kledingItem->save();

        return redirect()->route('kleding.bewerking')->with('status', 'nieuw artikel geupload');
    }

    public function destroy(KledingItem $kledingItem)
    {
        // als er een foto is, deze uit de public verwijderen
        if ($kledingItem->foto && Storage::disk('public')->exists($kledingItem->foto)) {
            Storage::disk('public')->delete($kledingItem->foto);
        }
        // Verwijder het artikel
        $kledingItem->delete();

        // Redirect met een flash bericht
        return redirect()->route('kleding.bewerking')->with('status', 'Artikel succesvol verwijderd.');

    }
}
