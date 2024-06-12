<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterCompanies extends Model
{
    protected $table="companies";
    protected $guarded=[];
    use HasFactory;

    // public function Departements(): HasMany
    // {
    //     return $this->hasMany(Departements::class);
    // }

    // public function Branches(): HasMany
    // {
    //     return $this->hasMany(Branches::class);
    // }
    
    // public function Branch(): BelongsTo
    // {
    //     return $this->belongsTo(Branches::class);
    // }
}
