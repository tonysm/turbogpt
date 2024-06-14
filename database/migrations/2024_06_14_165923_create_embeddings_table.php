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
        Schema::connection('embeddings')->create('embeddings', function (Blueprint $table) {
            $table->id();
            $table->text('chunk');
            $table->integer('chunk_size');
            $table->vector('embedding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('embeddings')->dropIfExists('embeddings');
    }
};
