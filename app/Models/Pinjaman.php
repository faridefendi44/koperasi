<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_pinjaman',
        'id_anggota',
        'jangka_waktu',
        'jumlah_pinjaman',
        'tanggal_pinjaman',
        'status',
        'status_pelunasan',
    ];
    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }
    public function angsuran(){
        return $this->hasMany(Angsuran::class, 'id_pinjaman', 'id_pinjaman');
    }
}
