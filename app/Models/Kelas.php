<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'id_kelas';
    protected $table = 'kelas'; 
    protected $fillable = ['kode_kelas', 'ruangan', 'mata_kuliah_id'];

    public function mata_kuliah() {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id_mata_kuliah');
    }

    public function jadwal() {
        return $this->hasOne(Jadwal::class, 'kelas_id', 'id_kelas');
    }

    public function krs() {
        return $this->hasMany(KRS::class, 'kelas_id', 'id_kelas');
    }
}
