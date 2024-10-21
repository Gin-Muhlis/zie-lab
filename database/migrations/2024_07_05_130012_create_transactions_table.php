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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('code');
            $table->date('date');
            $table->double('total');
            $table->double('discount');
            $table->double('final_total');
            $table->string('snap_token')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['berhasil', 'menunggu pembayaran', 'gagal', 'dibatalkan']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
