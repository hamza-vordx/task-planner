<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/mock-one', [DataController::class, 'mockOne']);
Route::get('/mock-two', [DataController::class, 'mockTwo']);
