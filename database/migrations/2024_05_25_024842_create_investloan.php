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
        Schema::create('investloan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee');
            $table->string('loan')->nullable();
            $table->string('loanlimit')->nullable();
            $table->date('tglloan')->nullable();
            $table->date('tglpaid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investloan');
    }
};
