<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{    
    protected $table="departements";
    protected $guarded=[];
    use HasFactory;

    // public function employees()
    // {
    //     return $this->hasMany(Employees::class);
    // }
    // public function mutation()
    // {
    //     return $this->hasMany(Mutation::class);
    // }
}
