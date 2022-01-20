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
        'judul_pkm',          
        'nama_dosen_id', 
        'mata_kuliah_id',                   
        'bentuk_integrasi',              
        'prodi_id'                   

    ];
    public $timestamps = false;
}
