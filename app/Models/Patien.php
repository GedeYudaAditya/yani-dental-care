<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patien extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'ttl',
        'alamat_rumah',
        'alamat_kantor',
        'no_hp',
        'jenis_kelamin',
        'pekerjaan',
    ];

    public function medicalRecord()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function radiology()
    {
        return $this->hasMany(Radiology::class);
    }
}
