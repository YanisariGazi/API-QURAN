<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juz extends Model
{
    use HasFactory;

    public $fillable =[
        'juz',
        'mulaiDi',
    ]; 

    public function surahs(){
        return $this->hasMany(Surah::class, 'juz_id', 'juz');
    }
}
