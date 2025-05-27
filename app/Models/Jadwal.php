<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $primaryKey = 'id_jadwal';
    protected $table = 'jadwal'; 
    protected $fillable = ['kelas_id', 'hari', 'jam_mulai', 'jam_selesai', 'ruangan'];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }
    public function krs() {
        return $this->hasMany(KRS::class, 'jadwal_id', 'id_jadwal');
    }
}

