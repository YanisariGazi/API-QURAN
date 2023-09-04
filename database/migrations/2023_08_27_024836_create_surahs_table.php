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
        Schema::create('surahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('juz_id');
            $table->unsignedInteger('surahKe')->index();
            $table->string('nama');
            $table->string('namaLatin');
            $table->unsignedInteger('jumlahAyat');
            $table->string('tempatTurun');
            $table->string('arti');
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('juz_id')->references('juz')->on('juzs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surahs');
    }
};
