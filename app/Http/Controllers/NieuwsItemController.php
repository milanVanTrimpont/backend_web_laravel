<?php

namespace App\Http\Controllers;

use App\Models\NieuwsItem;
use Illuminate\Http\Request;

class NieuwsItemController extends Controller
{
    public function index()
    {
        $nieuwsItems = NieuwsItem::orderBy('created_at', 'desc')->get();
        return view('nieuws.index', compact('nieuwsItems'));
    }

    public function admin()
    {
        $nieuwsItems = NieuwsItem::orderBy('created_at', 'desc')->get();
        return view('nieuws.bewerking', compact('nieuwsItems'));
    }

    public function edit(NieuwsItem $nieuwsItem)
    {
        return view('nieuws.bewerking.edit', compact('nieuwsItem'));
    }

    public function update(Request $request, NieuwsItem $nieuwsItem)
    {

        $validated = $request->validate([
            'titel' => 'required|max:255',
            'content' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('Nieuws', 'public');
            info('Foto opgeslagen:', ['path' => $validated['foto']]);
        }
    
        $updated = $nieuwsItem->update($validated);
    
        return redirect()->route('nieuws.bewerking')->with('success', 'Nieuwsartikel bijgewerkt!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $NieuwsItem = new NieuwsItem();
        $NieuwsItem->titel = $validated['titel'];
        $NieuwsItem->content = $validated['content'];

        if ($request->hasFile('foto')) {
            $NieuwsItem->foto = $request->file('foto')->store('nieuws_fotos', 'public');
        }

        $NieuwsItem->save();

        return redirect()->route('nieuws.bewerking')->with('status', 'nieuw artikel geupload');
    }

    public function destroy(NieuwsItem $NieuwsItem)
    {
        // Verwijder het artikel
        $NieuwsItem->delete();

        // Redirect met een flash bericht
        return redirect()->route('nieuws.bewerking')->with('status', 'Artikel succesvol verwijderd.');

    }

}
