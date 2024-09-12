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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10);
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->string('link_gdrive')->nullable();
            $table->string('file_book')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->double('price');
            $table->enum('type', ['E-Book', 'E-Course', 'E-File']);
            $table->enum('status', ['draft', 'published']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
