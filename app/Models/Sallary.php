<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sallary extends Model
{
    protected $table="salarydetail";
    protected $guarded=[];
    use HasFactory;
}
