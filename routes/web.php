<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','tenant'])->group(function () {
    Route::view('/checkin','checkin.index');
    Route::view('/operator','operator.index');
    Route::view('/display','display.index');
    Route::view('/dashboard','dashboard.index');
    Route::get('/display/data', fn() => response()->json(['current_ticket'=>null,'latest_calls'=>[]]));
});
