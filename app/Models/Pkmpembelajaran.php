<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkmpembelajaran extends Model
{
    use HasFactory;
    protected $table = 'pkm_pembelajaran';
    protected $primaryKey = 'id_pkm_pembelajaran';
    protected $fillable = 
    [
    	'id_pkm_pembelajaran',
    	'judul_pkm',
    	'nama_dosen',
    	'matkul',
    	'bentuk_integrasi',
    	'tahun'
    ];
    public $timestamps = false;
}
