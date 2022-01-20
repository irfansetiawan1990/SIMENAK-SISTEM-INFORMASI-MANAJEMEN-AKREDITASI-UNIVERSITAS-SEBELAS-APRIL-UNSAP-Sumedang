<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepuasanmhs extends Model
{
    use HasFactory;
    protected $table = 'kepuasan_mhs';
    protected $primaryKey = 'id_kepuasanmhs';
    protected $fillable = 
    [ 
    	'id_kepuasanmhs',
    	'aspek_yg_diukur',
        'sangat_baik',
        'baik',
        'cukup',
        'kurang',
    	'rencana_tindak_lanjut',
        'prodi_id'

    ];

    public $timestamps = false;
}
