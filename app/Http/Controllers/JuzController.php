<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JuzController extends Controller
{
    public function createJuz(Request $request){
        $validator = Validator::make($request->all(),[
            'juz' => ['required'],
            'mulaiDi' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json([
                'Error' => true,
                'Massage' => $validator->errors()
            ]);
        }

        $juz = new Juz();
        $juz->juz = $request->juz;
        $juz->mulaiDi = $request->mulaiDi;
        $juz->save();

        return response()->json($juz);
    }
}
