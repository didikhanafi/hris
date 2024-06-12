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
        Schema::create('mutation', function (Blueprint $table) {
            $table->id();
            $table->string('mutation_ke')->nullable();
            $table->date('tglawal')->nullable();
            $table->date('tglakhir')->nullable();
            $table->foreignId('employee_id')->constrained('employee')->onDelete('restrict');
            $table->foreignId('companies_id')->constrained('companies')->onDelete('restrict');
            $table->foreignId('departement_id')->constrained('departements')->onDelete('restrict');
            $table->foreignId('branch_id')->constrained('branches')->onDelete('restrict');
            $table->foreignId('position_id')->constrained('position')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutation');
    }
};
