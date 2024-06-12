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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->string('alamat');
            $table->integer('no_hp');
            $table->integer('jumlah');
            $table->integer('biaya');
            $table->string('original_buktiimage')->nullable();
            $table->string('encrypted_buktiimage')->nullable();
            $table->foreignId('metode_id')->constrained();
            $table->foreignId('statuse_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
