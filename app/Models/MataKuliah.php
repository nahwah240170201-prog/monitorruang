<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliahs';

    protected $fillable = [
        'semester_id',
        'kelas',
        'nama_mk',
        'nama_dosen',
        'sks',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}