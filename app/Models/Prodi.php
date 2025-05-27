<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $primaryKey = 'id_prodi';
    protected $table = 'prodi'; 
    protected $fillable = ['nama', 'fakultas_id'];

    public function mahasiswas() {
        return $this->hasMany(Mahasiswa::class, 'prodi_id', 'id_prodi');
    }
    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id_fakultas');
    }
}
