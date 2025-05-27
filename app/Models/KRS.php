<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    protected $primaryKey = 'id_krs';
    protected $table = 'krs'; 
    protected $fillable = ['mahasiswa_id', 'jadwal_id', 'tahun_ajaran', 'semester'];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    public function jadwal() {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id_jadwal');
    }

    public function khs() {
        return $this->hasOne(KHS::class, 'krs_id', 'id_krs');
    }

    public function absensi() {
        return $this->hasMany(Absensi::class, 'krs_id', 'id_krs');
    }
}

