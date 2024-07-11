<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_anggota',
        'id_simpanan',
        'tanggal_simpanan',
        'simpanan_wajib',
        'status',
    ];
    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }
}
