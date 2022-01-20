<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarpsunipengelolaprodi extends Model
{

    protected $table = 'tb_daftarpsunipengelolaprodi';
    protected $primaryKey ='id_upps';
    protected $fillable = [
        'jenis_program',
        'prodi_id',
        'status',
        'no_tgl_sk',
        'tgl_kadaluarsa',
        'jml_mhs_saat_ts'
    ];
    
    public $timestamps = false;
  
   
}

