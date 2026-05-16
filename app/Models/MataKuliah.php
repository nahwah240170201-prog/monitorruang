<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'semester_id',
        'kode',
        'nama_mata_kuliah',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}