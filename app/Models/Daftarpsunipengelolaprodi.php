<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarpsunipengelolaprodi extends Model
{

    protected $table = 'tb_daftarpsunipengelolaprodi';
    protected $fillable = [
        'id',
        'jenis_program',
        'nama_ps',
        'status',
        'no_tgl_sk',
        'tgl_kadaluarsa',
        'jml_mhs_saat_ts'
    ];
    
    public $timestamps = false;
  
   
}

