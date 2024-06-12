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
        Schema::create('salarydetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee');
            $table->string('salary')->nullable();
            $table->string('salarystd')->nullable();
            $table->string('uangmakan')->nullable();
            $table->string('transport')->nullable();
            $table->string('tunjanganjabatan')->nullable();
            $table->string('tunjanganrumah')->nullable();
            $table->string('tunjanganphone')->nullable();
            $table->string('tunjanganperjalanan')->nullable();
            $table->string('insentif1')->nullable();
            $table->string('insentif2')->nullable();
            $table->string('komisi')->nullable();
            $table->string('lembur')->nullable();
            $table->string('sewamotor')->nullable();
            $table->string('claimparkir')->nullable();
            $table->string('biayalain')->nullable();
            $table->string('pensiun')->nullable();
            $table->string('bpjs_tk')->nullable();
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('pph21')->nullable();
            $table->string('lainlain')->nullable();
            $table->string('harikerja')->nullable();
            $table->string('limitloan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salarydetail');
    }
};
