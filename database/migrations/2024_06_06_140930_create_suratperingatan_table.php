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
        Schema::create('suratperingatan', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('companies_id');
            $table->string('position_id');
            $table->string('suratperingatan');
            $table->string('spke');
            $table->string('tglawalsp');
            $table->string('tglakhirsp');
            $table->string('keterangansp')->nullable();
            $table->string('tempatsp');
            $table->string('tglsp');
            $table->string('syaratsp1')->nullable();
            $table->string('syaratsp2')->nullable();
            $table->string('syaratsp3')->nullable();
            $table->string('atasanlgs')->nullable();
            $table->string('atasanlgsposition')->nullable();
            $table->string('mengetahui')->nullable();
            $table->string('mengetahuiposition')->nullable();
            $table->string('kuasahukum')->nullable();
            $table->string('arsip')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratperingatan');
    }
};
