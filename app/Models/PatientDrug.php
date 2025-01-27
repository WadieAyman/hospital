<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientDrug extends Model
{
    //
    protected $table = 'patientdrug';
    protected $fillable = [
        'pat_id',
        'drug_id'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    protected function casts(): array
    {
        return [
            'drug_id' => 'array',
        ];
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pat_id', 'id');
    }
    public function drugs()
    {
        return $this->belongsTo(Drug::class, 'drug_id', 'id');
    }
}
