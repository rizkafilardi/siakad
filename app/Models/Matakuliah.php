<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $primaryKey = 'id_mata_kuliah';
    protected $table = 'mata_kuliah'; 
    protected $fillable = ['kode', 'nama', 'sks', 'semester', 'dosen_pengampu', 'dosen_pengampu_1_id', 'dosen_pengampu_2_id', 'dosen_pengampu_3_id'];
    public function krs() {
        return $this->hasMany(KRS::class, 'mata_kuliah_id', 'id_mata_kuliah');
    }

    public function kelas() {
        return $this->hasMany(Kelas::class, 'mata_kuliah_id', 'id_mata_kuliah');
    }
    public function dosen1() {
        return $this->belongsTo(Dosen::class, 'dosen_pengampu_1_id', 'id_dosen');
    }
    public function dosen2() {
        return $this->belongsTo(Dosen::class, 'dosen_pengampu_2_id', 'id_dosen');
    }
    public function dosen3() {
        return $this->belongsTo(Dosen::class, 'dosen_pengampu_3_id', 'id_dosen');
    }
}
