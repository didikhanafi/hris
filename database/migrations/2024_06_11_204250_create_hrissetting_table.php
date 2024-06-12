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
        Schema::create('hrissetting', function (Blueprint $table) {
            $table->id();
            $table->string('webname')->default('-');
            $table->string('lightlogo')->default('logo.png');
            $table->string('favicon')->default('favicon.png');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrissetting');
    }
};
