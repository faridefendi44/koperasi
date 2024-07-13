<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pinjaman',
        'id_anggota',
        'tanggal_angsuran',
        'angsuran_pokok',
        'jumlah_sisa',
        'bunga',
        'total_angsuran',
    ];
    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }
    public function pinjaman(){
        return $this->belongsTo(Pinjaman::class, 'id_pinjaman', 'id');
    }
}
