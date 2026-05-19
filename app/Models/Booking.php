<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [

        'nama',
        'kelas',
        'jenis_booking',
        'mata_kuliah',
        'alasan',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan',
        'catatan',
        'status',

    ];

}