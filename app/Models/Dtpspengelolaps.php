<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtpspengelolaps extends Model
{
    use HasFactory;
    protected $table = 'daftar_ps_diunit_pengelola_ps';
    protected $primaryKey = 'id_ps';
    protected $fillable = ['id_ps','jenis_program','nama_ps','status','no_tgl_sk','tgl_kadaluarsa,jml_mhs_saat_ts'];
    public $timestamps = false; 
}
