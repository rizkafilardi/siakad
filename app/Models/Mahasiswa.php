<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primaryKey = 'id_mahasiswa';
    protected $table = 'mahasiswa'; 
    protected $fillable = ['user_id', 'nim', 'nama', 'angkatan', 'prodi_id'];

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id_prodi');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function krs() {
        return $this->hasMany(KRS::class, 'mahasiswa_id', 'id_mahasiswa');
    }
}