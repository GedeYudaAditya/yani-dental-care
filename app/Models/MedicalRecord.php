<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'gol_darah',
        'penyakit_jantung',
        'haemophilia',
        'penyakit_lain',
        'alergi_obat',
        'alergi_makanan',
        'tekanan_darah',
        'diabetes',
        'hepatitis',
        'gigi',
        'anamnesa',
        'diagnosa',
        'tindakan',
        'patien_id',
    ];

    public function patien()
    {
        return $this->belongsTo(Patien::class);
    }

    public function radiology()
    {
        return $this->hasMany(Radiology::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }
}
