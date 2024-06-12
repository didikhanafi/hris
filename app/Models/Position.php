<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table="position";
    protected $guarded=[];
    use HasFactory;

        
    // public function mutation()
    // {
    //     return $this->hasMany(Mutation::class);
    // }
}
