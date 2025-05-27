<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $primaryKey = 'id_fakultas';
    protected $table = 'fakultas'; 
    protected $fillable = ['nama'];

    public function prodi() {
        return $this->hasMany(Prodi::class, 'fakultas_id', 'id_fakultas');
    }
}
