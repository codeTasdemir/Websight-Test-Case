<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Liste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ListController extends Controller
{

    public function store(Request $request)
    {
        $list = new Liste();
        $list->name = $request->name;
        $list->slug = Str::slug($request->name);
        $list->user_id = $request->user_id;
        $list->panel_id = $request->panel_id;
        $list->save();
        return response()->json($list);
    }
}
