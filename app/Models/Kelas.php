<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'mata_kuliah_id',
        'nama_kelas',
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}