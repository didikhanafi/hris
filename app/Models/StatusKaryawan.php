<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKaryawan extends Model
{
    protected $table="statusnikah";
    protected $guarded=[];
    use HasFactory;
    
    public function employees()
    {
        return $this->hasMany(Employees::class);
    }
}
