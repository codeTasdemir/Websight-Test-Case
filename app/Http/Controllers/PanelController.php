<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Liste;
use App\Models\Panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PanelController extends Controller
{
    public function index()
    {
        $panels = Panel::where('user_id',Auth::user()->id)->get();
        return view('panels',compact('panels'));
    }

    public function store(Request $request)
    {
        $panel = new Panel();
        $panel->name = $request->name;
        $panel->slug = Str::slug($request->name);
        $panel->user_id = $request->user_id;
        $panel->save();
    }

    public function show(Request $request,$id)
    {
        $panel = Panel::find($id);
        $lists = Liste::with('cards')->where('user_id',Auth::user()->id)->where('panel_id',$id)->get();
        $cards = Card::with(['list','controls'])->where('user_id',Auth::user()->id)->get();
        return view('index',compact('lists','cards','panel'));
    }
}
