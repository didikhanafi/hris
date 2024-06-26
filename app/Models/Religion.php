<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table="religion";
    protected $guarded=[];
    use HasFactory;

    
    public function employees()
    {
        return $this->hasMany(Employees::class);
    }
}
