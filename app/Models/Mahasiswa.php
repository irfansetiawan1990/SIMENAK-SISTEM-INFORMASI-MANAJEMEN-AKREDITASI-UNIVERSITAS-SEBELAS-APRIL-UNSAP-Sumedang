<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'id_mhs';
    protected $fillable = ['nama','nim','alamat','tlp','id_prodi'];
    public 	  $timestamps = false;
}
