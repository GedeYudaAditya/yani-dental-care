<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RCT extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
