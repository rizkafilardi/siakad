<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $primaryKey = 'id_dosen';
    protected $table = 'dosen'; 
    protected $fillable = ['user_id', 'nip', 'nama', 'bidang_keahlian'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
