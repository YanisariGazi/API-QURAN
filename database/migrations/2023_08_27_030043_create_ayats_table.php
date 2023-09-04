<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ayats', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('surahKe_id'); // Foreign key untuk relasi dengan tabel surahs
            $table->unsignedInteger('nomorAyat');
            $table->string('teksArabH');
            $table->string('teksArab');
            $table->string('teksLatin');
            $table->string('teksIndonesia');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('surahKe_id')->references('surahke')->on('surahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayats');
    }
};
