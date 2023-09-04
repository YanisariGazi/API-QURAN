<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use App\Models\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurahController extends Controller
{
    Public function createSurah(Request $request, $juz){
        $validator = Validator::make($request->all(),[
            'surahKe' => ['required'],
            'nama' => ['required'],
            'namaLatin' => ['required'],
            'jumlahAyat' => ['required'],
            'tempatTurun' => ['required'],
            'arti' => ['required'],
            'deskripsi' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json([
                'Error' => true,
                'Massage' => $validator->errors()
            ]);
        }

        $juz_id = Juz::where('juz', $juz)->first()->juz;

        if(!$juz_id){
            return response()->json([
                'Massage' => 'Juz Not Found'
            ]);
        }

        $surah = new Surah();
        $surah->juz_id = $juz_id;
        $surah->surahKe = $request->surahKe;
        $surah->nama = $request->nama;
        $surah->namaLatin = $request->namaLatin;
        $surah->jumlahAyat = $request->jumlahAyat;
        $surah->tempatTurun = $request->tempatTurun;
        $surah->arti = $request->arti;
        $surah->deskripsi = $request->deskripsi;
        $surah->save();

        return response()->json($surah);
    }
}
