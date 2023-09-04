<?php

namespace App\Http\Controllers;

use App\Models\Ayat;
use App\Models\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AyatController extends Controller
{
    public function createAyat(Request $request, $surahKe){
        $validator = Validator::make($request->all(), [
            'nomorAyat' => ['required'],
            'teksArabH' => ['required'],
            'teksArab' => ['required'],
            'teksLatin' => ['required'],
            'teksIndonesia' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json([
                'Error' => true,
                'Massage' => $validator->errors()
            ]);
        }

        $surahKe = Surah::where('surahKe', $surahKe)->first()->surahKe;
        if(!$surahKe){
            return response()->json([
                'Massage' => 'Surah Not Found'
            ]);
        }

        $ayat = new Ayat();
        $ayat->surahKe_id = $surahKe;
        $ayat->nomorAyat = $request->nomorAyat;
        $ayat->teksArabH = $request->teksArabH;
        $ayat->teksArab = $request->teksArab;
        $ayat->teksLatin = $request->teksLatin;
        $ayat->teksIndonesia = $request->teksIndonesia;
        $ayat->save();

        return response()->json($ayat);
    }
}
