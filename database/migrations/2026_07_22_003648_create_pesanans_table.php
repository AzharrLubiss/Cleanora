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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('layanan_id')->constrained('layanans')->restrictOnDelete();
            $table->decimal('berat', 5, 2);
            $table->decimal('harga_per_kg', 10, 2);
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', [
                'menunggu',
                'dicuci',
                'disetrika',
                'siap_diambil',
                'selesai'
            ])->default('menunggu');
            $table->date('tanggal_masuk');
            $table->date('tanggal_selesai')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
