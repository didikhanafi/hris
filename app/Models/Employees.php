<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table="employee";
    protected $guarded=[];
    use HasFactory;

    public function mutation()
    {
        return $this->hasMany(Mutation::class);
    }

    
    // Jika seorang karyawan hanya bekerja di satu perusahaan
    // public function company()
    // {
    //     return $this->belongsTo(Company::class);
    // }

    // // Jika seorang karyawan bekerja di banyak perusahaan (many-to-many relationship)
    // public function companies()
    // {
    //     return $this->belongsToMany(Company::class);
    // }

        // Mendefinisikan hubungan dengan tabel 'companies'
        public function companies()
        {
            return $this->belongsTo(MasterCompanies::class, 'company_id'); // Asumsi setiap karyawan memiliki hubungan belongsTo dengan perusahaan
        }

        public function positions()
        {
            return $this->belongsTo(Position::class, 'position'); // Asumsi setiap karyawan memiliki hubungan belongsTo dengan jabatan
        }
        public function religions()
        {
            return $this->belongsTo(Religion::class, 'religion_id');
        }
        public function statusnikahs()
        {
            return $this->belongsTo(StatusKaryawan::class, 'statusnikah');
        }
        public function pendidikans()
        {
            return $this->belongsTo(MasterPendidikan::class, 'pendidikan');
        }

        
        public function branches()
        {
            return $this->belongsTo(Branches::class, 'branch_id');
        }
    
        // Mendefinisikan hubungan dengan tabel 'mutations'
        public function mutations()
        {
            return $this->hasMany(Mutation::class, 'employee_id'); // Asumsi setiap karyawan dapat memiliki banyak mutasi
        }


        // $table->foreignId('position_id')->constrained('position');

        public function departement()
        {
            return $this->belongsTo(Departements::class);
        }


        public function suratperingatan()
        {
            return $this->hasMany(SuratPeringatan::class, 'employee_id');
        }
    
        public function spk()
        {
            return $this->hasMany(SuratPK::class, 'employee_id');
        }
    
        public function loan()
        {
            return $this->hasMany(Loan::class, 'employee_id');
        }        

}
