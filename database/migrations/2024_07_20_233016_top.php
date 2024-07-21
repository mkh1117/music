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
        Schema::create('top', function (Blueprint $table) {
            $table->id();
            $table->string('music',60);
            $table->string('picture',60);
            $table->string('text',35);
            $table->string('text1',35);
            $table->string('lyric',500)->nullable(true);
            $table->integer('key_out')->unique();
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top');
    }
};
