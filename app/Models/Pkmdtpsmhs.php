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
    	'id_pkm_dtps_mhs',
    	'nama_dosen',
    	'tema_pkm_roadmap',
    	'nama_mhs',
    	'judul_kegiatan',
        'tahun'

    ] ;
    public $timestamps = false;
}



