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
        Schema::create('history_bahan', function (Blueprint $table) {
            $table->id();
             // relasi ke tabel bahans (boleh null kalau bahan dihapus)
            $table->foreignId('bahan_id')
                ->nullable()
                ->constrained('bahan')
                ->nullOnDelete();

            // snapshot nama bahan (biar history tetap ada)
            $table->string('nama_bahan');

            // jenis transaksi
            $table->enum('type', ['penambahan', 'pengurangan']);

            // jumlah (angka saja)
            $table->unsignedInteger('jumlah');

            // satuan (kg, pcs, dll)
            $table->string('satuan')->nullable();

            // keterangan
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_bahan');
    }
};
