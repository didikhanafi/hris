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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('employeecode');
            $table->string('uploademployee')->nullable();
            $table->string('employee')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provensi')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->string('gender')->nullable();
            $table->string('statusnikah')->nullable();
            $table->foreignId('religion_id')->constrained('religion')->onDelete('restrict');
            $table->foreignId('pendidikan')->constrained('pendidikan')->onDelete('restrict');
            // $table->foreignId('companies_id')->constrained('master_companies')->onDelete('restrict');
            // Tambahkan kolom company_id jika diperlukan
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict');          
            $table->foreignId('branches_id')->constrained('branches')->onDelete('restrict'); 
            $table->foreignId('departements_id')->constrained('departements')->onDelete('restrict'); 
           
            
            $table->string('uploadktp')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ktpalamat')->nullable();
            $table->string('ktpprovensi')->nullable();
            $table->string('ktpkota')->nullable();
            
            $table->string('spousename')->nullable();
            // $table->string('spousealamat')->nullable();
            $table->string('spousecity')->nullable();
            $table->string('spouseprovensi')->nullable();
            $table->string('spousetempatlahir')->nullable();
            $table->date('spousetgllahir')->nullable();
            $table->date('spousetglnikah')->nullable();
            $table->string('spousejob')->nullable();
            $table->string('jmlanak')->nullable();
            
            $table->date('tglmasuk')->nullable();
            $table->date('tglkeluar')->nullable();
            $table->string('statuskontrak')->nullable();
            $table->date('tglstatuskontrak')->nullable();
            $table->string('employeestatus')->nullable();
            $table->string('position')->nullable();
            $table->string('npwp')->nullable();
            $table->string('jamsostek')->nullable();
            $table->string('asuransi')->nullable();
            $table->string('bank')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bankacc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
