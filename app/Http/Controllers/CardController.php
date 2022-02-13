<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Liste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Prophecy\Doubler\CachedDoubler;

class CardController extends Controller
{
    public function store(Request $request)
    {
        $card = new Card();
        $card->title = $request->title;
        $card->slug = Str::slug($request->title);
        $card->user_id = $request->user_id;
        $card->list_id = $request->list_id;
        $card->save();
        return response()->json($card);
    }

    public function update(Request $request)
    {
        $card = Card::find($request->card_id);
        $card->description = $request->description;
        $card->save();
    }
}
