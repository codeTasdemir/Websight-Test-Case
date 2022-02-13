<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Controls;
use App\Models\Liste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $cards = Card::with(['list','controls'])->where('user_id',Auth::user()->id)->get();
        $lists = Liste::with('cards')->where('user_id',Auth::user()->id)->get();
        return view('index',compact('lists','cards'));
    }


}
