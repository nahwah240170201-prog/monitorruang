<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            $table->string('nama');

            $table->string('kelas')->nullable();

            $table->string('jenis_booking');

            $table->string('mata_kuliah')->nullable();

            $table->text('alasan')->nullable();

            $table->string('hari');

            $table->time('jam_mulai');

            $table->time('jam_selesai');

            $table->string('ruangan');

            $table->text('catatan')->nullable();

            $table->string('status')
                  ->default('Digunakan');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};