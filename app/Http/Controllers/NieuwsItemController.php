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
}
