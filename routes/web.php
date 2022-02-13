<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\PanelController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::prefix('/')->group(function (){
    Route::get('/index',[IndexController::class,'index'])->middleware('auth')->name('index');
    Route::get('/card-edit/{slug}',[IndexController::class,'edit'])->name('card.edit');

    Route::post('/list-add',[ListController::class,'store'])->name('list.store');

    Route::post('/card-add',[CardController::class,'store'])->name('card.store');
    Route::post('/card-update',[CardController::class,'update'])->name('card.update');

    Route::post('/control-add',[ControlController::class,'store'])->name('control.store');
    Route::post('/control-update',[ControlController::class,'update'])->name('control.update');

    Route::get('/panels',[PanelController::class,'index'])->middleware('auth')->name('panel.index');
    Route::post('/panel-add',[PanelController::class,'store'])->name('panel.store');
    Route::get('/panel/{id}/{slug}',[PanelController::class,'show'])->name('panel.show');

});

