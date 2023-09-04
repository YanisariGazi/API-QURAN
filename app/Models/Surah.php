<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    use HasFactory;

    protected $fillable = [
        'juz_id',
        'surahKe',
        'nama',
        'namaLatin',
        'jumlahAyat',
        'tempatTurun',
        'arti',
        'deskripsi',
    ];

    // Relasi ke tabel ayats
    public function ayats()
    {
        return $this->hasMany(Ayat::class);
    }

    public function juzs(){
        return $this->belongsTo(Juz::class, 'juz_id', 'juz');
    }
}
