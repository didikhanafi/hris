<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDepartements extends Model
{
    protected $table="subdepartements";
    protected $guarded=[];
    use HasFactory;

        
    public function mutation()
    {
        return $this->hasMany(Mutation::class);
    }
}
