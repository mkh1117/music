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
        Schema::create('callus', function (Blueprint $table) {
            $table->id();
            $table->string('instagram',40)->nullable(true);
            $table->string('phoneNumber',40)->nullable(true);
            $table->string('gmail',40)->nullable(true);
            $table->string('telegram',50)->nullable(true);
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('callus');
    }
};
