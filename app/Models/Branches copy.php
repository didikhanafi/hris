<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branches extends Model
{
    protected $table="branches";
    protected $guarded=[];
    use HasFactory;

    public function Companies(): BelongsTo
    {
        return $this->belongsTo(MasterCompanies::class, 'companies_id');
    }
}
