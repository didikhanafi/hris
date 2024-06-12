<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPendidikan extends Model
{
    protected $table="pendidikan";
    protected $guarded=[];
    use HasFactory;
    
    public function employees()
    {
        return $this->hasMany(Employees::class);
    }
}
