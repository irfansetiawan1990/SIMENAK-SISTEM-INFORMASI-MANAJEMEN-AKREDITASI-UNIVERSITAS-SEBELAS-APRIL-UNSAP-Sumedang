<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksimhsbaru extends Model
{
    use HasFactory;
    protected $table = 'seleksi_mhs_baru';
    protected $primaryKey = 'id_seleksi_mhs';
    protected $fillable = 
    [
    	'id_seleksi_mhs',
    	'tahun_akademik',
    	'daya_tampung',
    	'pendaftar',
    	'lulus_seleksi',
        'reguler1',
        'transfer1',
        'reguler2',
        'transfer2',
        'jumlah1'
    ];
    public $timestamps = false;

}
