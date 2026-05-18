<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi (WAJIB untuk register/login)
     */
    protected $fillable = [
        'nama',
        'nim',
        'password',
        'role',
        'kelas',
        'semester',
        'mata_kuliah',
    ];

    /**
     * Kolom yang disembunyikan saat return JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}