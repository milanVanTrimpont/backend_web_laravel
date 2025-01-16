<?php

namespace App\Http\Controllers;

use App\Models\NieuwsItem;
use Illuminate\Http\Request;

class NieuwsItemController extends Controller
{
    public function index()
    {
        $nieuwsItems = NieuwsItem::orderBy('publicatiedatum', 'desc')->get();
        return view('nieuws.index', compact('nieuwsItems'));
    }

    public function admin()
    {
        $nieuwsItems = NieuwsItem::orderBy('publicatiedatum', 'desc')->get();
        return view('admin.nieuws', compact('nieuwsItems'));
    }

    public function edit(NieuwsItem $nieuwsItem)
    {
        return view('admin.nieuws.edit', compact('nieuwsItem'));
    }

    public function update(Request $request, NieuwsItem $nieuwsItem)
    {
        // Log de ontvangen gegevens voor debugging
        info('Update data ontvangen:', $request->all());
    
        // Valideer de binnenkomende gegevens
        $validated = $request->validate([
            'titel' => 'required|max:255',
            'content' => 'required',
            'foto' => 'nullable|image|max:2048',
            'publicatiedatum' => 'required|date',
        ]);
    
        // Log de gevalideerde data
        info('Gevalideerde gegevens:', $validated);
    
        // Controleer of er een foto is geüpload
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('Nieuws', 'public');
            info('Foto opgeslagen:', ['path' => $validated['foto']]);
        }
    
        // Probeer het nieuwsartikel bij te werken
        $updated = $nieuwsItem->update($validated);
        info('Nieuwsartikel bijgewerkt?', ['result' => $updated, 'data' => $nieuwsItem->toArray()]);
    
        return redirect()->route('admin.nieuws')->with('success', 'Nieuwsartikel bijgewerkt!');
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
        $NieuwsItem->publicatiedatum = now();

        if ($request->hasFile('foto')) {
            $NieuwsItem->foto = $request->file('foto')->store('nieuws_fotos', 'public');
        }

        $NieuwsItem->save();

        return redirect()->route('admin.nieuws')->with('status', 'nieuw artikel geupload');
    }

    public function destroy(NieuwsItem $NieuwsItem)
    {
        // Verwijder het artikel
        $NieuwsItem->delete();

        // Redirect met een flash bericht
        return redirect()->route('admin.nieuws')->with('status', 'Artikel succesvol verwijderd.');

    }

}
