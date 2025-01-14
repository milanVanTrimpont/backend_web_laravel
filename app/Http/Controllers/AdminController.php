<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NieuwsItem;

class AdminController extends Controller
{

    public function index()
    {
        $nieuwsItems = NieuwsItem::orderBy('publicatiedatum', 'desc')->get();
        return view('admin.nieuws', compact('nieuwsItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $nieuws = new NieuwsItem();
        $nieuws->titel = $validated['titel'];
        $nieuws->content = $validated['content'];
        $nieuws->publicatiedatum = now();

        if ($request->hasFile('foto')) {
            $nieuws->foto = $request->file('foto')->store('nieuws_fotos', 'public');
        }

        $nieuws->save();

        return redirect()->route('admin.nieuws')->with('status', 'nieuw artikel geupload');
    }

    public function destroy(NieuwsItem $nieuws)
    {
        // Verwijder het artikel
        $nieuws->delete();

        // Redirect met een flash bericht
        return redirect()->route('admin.nieuws')->with('status', 'Artikel succesvol verwijderd.');

    }
}
