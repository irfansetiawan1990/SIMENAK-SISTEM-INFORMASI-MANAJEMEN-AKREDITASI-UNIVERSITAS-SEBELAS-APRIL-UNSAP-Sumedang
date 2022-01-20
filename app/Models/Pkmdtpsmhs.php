<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkmdtpsmhs extends Model
{
    use HasFactory;
    protected $table = 'pkm_dtps_mhs';
    protected $primaryKey = 'id_pkm_dtps_mhs';
    protected $fillable = 
    [
    	'nama_dosen_id',
    	'tema_roadmap',
    	'mhs_id',
    	'judul_kegiatan',
        'tahun',
        'prodi_id'

    ] ;
    public $timestamps = false;
}



