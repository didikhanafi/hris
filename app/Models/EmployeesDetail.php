<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesDetail extends Model
{
    protected $table="employee";
    protected $fillable=[
        'company_id',
        'departements_id',
        'branches_id',
        'employeecode',
        'employee',
        'email',
        'alamat',
        'city',
        'provensi' ,
        'phone',
        'tempatlahir' ,
        'tgllahir' ,
        'gender',
        'statusnikah',
        'tglmasuk' ,
        'tglkeluar'  ,
        'statuskontrak' ,
        'employeestatus',
        'position',
        'uploademployee',
        'uploadktp'];
    use HasFactory;

    
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

        
        public function branches()
        {
            return $this->belongsTo(Branches::class, 'branch_id');
        }
    
        // Mendefinisikan hubungan dengan tabel 'mutations'
        public function mutations()
        {
            return $this->hasMany(Mutation::class, 'employee_id'); // Asumsi setiap karyawan dapat memiliki banyak mutasi
        }

}
