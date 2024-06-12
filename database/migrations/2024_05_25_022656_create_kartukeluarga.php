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
        Schema::create('kartukeluarga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee');
            $table->string('familyname')->nullable();
            $table->string('familystatus')->nullable();
            $table->string('familyktp')->nullable();
            $table->string('familypekerjaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartukeluarga');
    }
};
