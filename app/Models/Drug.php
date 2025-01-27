<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Drug extends Model
{
    /** @use HasFactory<\Database\Factories\DrugsFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'dosage',
        'productionDate',
        'expiryDate',
    ];

    public function patient()
    {
        return $this->belongsToMany(Patient::class, 'patientdrug','pat_id','pat_id');
    }
}
