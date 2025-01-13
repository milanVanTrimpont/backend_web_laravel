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

        return redirect()->route('nieuws')->with('status', 'news-created');
    }

}
