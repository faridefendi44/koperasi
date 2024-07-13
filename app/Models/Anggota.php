<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nip',
        'golongan',
        'gaji',
        'bidang',
        'alamat',
        'simpanan',
        'pangkat',
        'jabatan',
        'tanggal_masuk',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function simpanans(){
        return $this->hasMany(Simpanan::class, 'id_anggota', 'id');
    }
    public function angsurans(){
        return $this->hasMany(Simpanan::class, 'id_anggota', 'id');
    }
}
