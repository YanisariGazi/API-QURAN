<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'surah_id',
        'nomorAyat',
        'teksArabH',
        'teksArab',
        'teksLatin',
        'teksIndonesia',
    ];

    // Relasi ke tabel surahs
    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }
}
