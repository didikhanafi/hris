<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    protected $table="mutation";
    protected $guarded=[];
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }

    public function companies()
    {
        return $this->belongsTo(MasterCompanies::class, 'companies_id');
    }

    public function branches()
    {
        return $this->belongsTo(Branches::class, 'branch_id');
    }

    public function departements()
    {
        return $this->belongsTo(Departements::class, 'departement_id');
    }

    public function positions()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

}
