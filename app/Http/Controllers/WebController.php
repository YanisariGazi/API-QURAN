<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use App\Models\Surah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{

    public function showAllJuz(){
        $showAll = DB::table('juzs')->get();

        return response()->json([
            'Juz' => $showAll
        ]);  
    }

    public function showOneJuz($juz_id){
        $showAll = DB::table('juzs')
                        ->join('surahs', 'juzs.juz', '=', 'surahs.juz_id')
                        ->where('juz', $juz_id)
                        ->select('surahs.juz_id', 'surahs.surahKe', 'surahs.nama', 'surahs.namaLatin', 'surahs.jumlahAyat', 'surahs.tempatTurun', 'surahs.arti', 'surahs.deskripsi',)
                        ->first();

        if(!$showAll){
            return response()->json([
                'Massage' => 'Data Not Found'
            ], 402);  
        }
        return response()->json([
            'Juz' => $showAll
        ]);
    }

    public function showAllSurah(){
    
        $showAll = DB::table('surahs')
                        ->join('juzs', 'juzs.juz', '=', 'surahs.juz_id')
                        ->select('juzs.juz', 'juzs.mulaiDi')
                        ->select()
                        ->get();
        return response()->json([
            'Surah' => $showAll
        ]);
    }
    
    public function showOneSurah($juz_id, $surahKe){

        $showAll = DB::table('surahs')
                        ->join('juzs', 'juzs.juz', '=', 'surahs.juz_id')
                        ->join('ayats', 'ayats.surahKe_id', '=', 'surahs.surahKe')
                        ->where('juz', $juz_id)
                        ->where('surahKe', $surahKe)
                        ->select('juzs.juz', 'ayats.nomorAyat', 'ayats.teksArabH', 'ayats.teksArab', 'ayats.teksLatin', 'ayats.teksIndonesia',)
                        ->get();
        return response()->json([
            'Surah' => $showAll
        ]);
    }

    public function showOneAyat($surahKe, $nomorAyat){

        $showAll = DB::table('ayats')
                        ->join('surahs', 'ayats.surahKe_id', '=', 'surahs.surahKe')
                        ->where('surahKe', $surahKe)
                        ->where('nomorAyat', $nomorAyat)
                        ->first();

        if(!$showAll){
            return response()->json([
                'Massage' => 'Data Not Found'
            ], 402);  
        }
        return response()->json([
            'Ayat' => $showAll
        ]);
    }
}
