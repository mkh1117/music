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
        Schema::create('input', function (Blueprint $table) {
            $table->id();
            $table->string('music',60);
            $table->string('picture',60);
            $table->string('text',60);
            $table->string('text1',60);
            $table->string('lyric',500)->nullable(true);
            $table->string('category',20)->nullable(true)->default(null);
            $table->integer('view')->default(0);
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input');
    }
};
