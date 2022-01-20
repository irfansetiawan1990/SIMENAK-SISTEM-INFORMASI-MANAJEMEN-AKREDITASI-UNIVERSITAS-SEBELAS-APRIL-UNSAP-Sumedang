<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitiandtpsmhs extends Model
{
    use HasFactory;
    protected $table = 'penelitian_dtpsmhs';
    protected $primaryKey = 'id_penelitiandtps_mhs';
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



