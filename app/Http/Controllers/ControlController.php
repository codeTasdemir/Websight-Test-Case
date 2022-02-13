<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Controls;
use App\Models\Liste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ControlController extends Controller
{

    public function store(Request $request)
    {
        $control  = new Controls();
        $control->description = $request->description;
        $control->card_id = $request->card_id;
        $control->save();
        return response()->json($control);
    }

    public function update(Request $request)
    {
        $control = Controls::find($request->id);
        $control->is_check = "1";
        $control->save();
    }
}
