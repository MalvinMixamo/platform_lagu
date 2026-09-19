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
        Schema::create('lagu', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('string');
            $table->string('deskripsi');
            $table->longText('lirik');
            $table->date('tanggal_terbit');
        });

        Schema::create('album', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });
        Schema::create('genre', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });

        Schema::create('lagu_album', function (Blueprint $table) {
            $table->foreignId('lagu_id')->constrained('lagu')->onDelete('cascade');
            $table->foreignId('album_id')->constrained('album')->onDelete('cascade');
            $table->primary(['lagu_id', 'album_id']);
        });

        Schema::create('lagu_genre', function (Blueprint $table) {
            $table->foreignId('lagu_id')->constrained('lagu')->onDelete('cascade');
            $table->foreignId('genre_id')->constrained('genre')->onDelete('cascade');
            $table->primary(['lagu_id', 'genre_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lagu');
        Schema::dropIfExists('album');
        Schema::dropIfExists('lagu_album');
        Schema::dropIfExists('genre');
        Schema::dropIfExists('lagu_genre');
    }
};
