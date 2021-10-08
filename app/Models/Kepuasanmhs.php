<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepuasanmhs extends Model
{
    use HasFactory;
    protected $table = 'kepuasan_mhs';
    protected $primariKey = 'id_kepuasanmhs';
    protected $fillable = 
    [ 
    	'id_kepuasanmhs',
    	'aspek_yg_diukur',
    	'tingkat_kepuasan',
    	'rencana_tindak_lanjut'

    ]

    protected $fillable = false;
}
