<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {

            $table->id();

            $table->foreignId('semester_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('kode');
            $table->string('nama_mk');
            $table->string('sks');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};