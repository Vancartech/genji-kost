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
        Schema::create('transaksi_sewas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('kamar_id');
            $table->string('harga');
            $table->enum('status', ['pending', 'sukses', 'gagal']);
            $table->date('mulai');
            $table->date('batas');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_sewas');
    }
};
