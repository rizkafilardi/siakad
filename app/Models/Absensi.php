<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $primaryKey = 'id_absensi';
    protected $table = 'absensi'; 
    protected $fillable = ['krs_id', 'tanggal', 'status'];

    public function krs() {
        return $this->belongsTo(KRS::class, 'krs_id', 'id_krs');
    }
}
