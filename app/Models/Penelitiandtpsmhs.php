<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitiandtpsmhs extends Model
{
    use HasFactory;
    protected $table = 'penelitian_dtps_mhs';
    protected $primaryKey = 'id_penelitian_dtps_mhs';
    protected $fillable = 
    [
    	'id_penelitian_dtps_mhs',
    	'nama_dosen',
    	'tema_roadmap',
    	'nim',
    	'judul_kegiatan',
    	'tahun'
    ];
    public $timestamps = false;
}
