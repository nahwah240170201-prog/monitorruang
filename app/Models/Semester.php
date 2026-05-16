<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'nama_semester'
    ];

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
}