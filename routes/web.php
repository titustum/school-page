<?php

use App\Models\School;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{slug}/school', function () {
    $school = School::inRandomOrder()->first();

    return view('welcome', ['school' => $school]);
});
