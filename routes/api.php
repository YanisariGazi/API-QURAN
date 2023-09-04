<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AyatController;
use App\Http\Controllers\JuzController;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\WebController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('createJuz', [JuzController::class, 'createJuz']);

Route::post('createSurah/{juz}', [SurahController::class, 'createSurah']);

Route::post('createAyat/{surahKe}', [AyatController::class, 'createAyat']);

Route::get('showAllJuz', [WebController::class, 'showAllJuz']);
Route::get('showOneJuz/{juz_id}', [WebController::class, 'showOneJ  uz']);
Route::get('showAllSurah', [WebController::class, 'showAllSurah']);
Route::get('showOneJuz/{juz_id}/showOneSurah/{surahKe}', [WebController::class, 'showOneSurah']);
Route::get('showOneSurah/{surahKe}/showOneAyat/{nomorAyat}', [WebController::class, 'showOneAyat']);