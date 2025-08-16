<?php

namespace App\Http\Controllers;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
public function store(Request $request, $kledingItemId)
{
    $request->validate([
        'body' => 'required|string|max:1000',
    ]);

    Comment::create([
        'user_id' => auth()->id(),
        'kleding_item_id' => $kledingItemId,
        'body' => $request->body,
    ]);

    // terug naar de kleding pagina
    return redirect()->route('kleding.show', ['id' => $kledingItemId])->with('success', 'Comment geplaatst!');

}

}
