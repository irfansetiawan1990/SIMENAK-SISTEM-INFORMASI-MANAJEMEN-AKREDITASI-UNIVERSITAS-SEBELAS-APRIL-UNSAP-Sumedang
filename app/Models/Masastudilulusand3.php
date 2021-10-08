<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masastudilulusand3 extends Model
{
    use HasFactory;
    protected $table = 'masa_studi_lulusan_d3';
    protected $primaryKey = 'id_studi_lulusan_d3';
    protected $fillable =
    [
    		'id_studi_lulusan_d3',
    		'tahun_masuk',
    		'jml_mhs_diterima',
    		'akhir_ts4',
    		'akhir_ts3',
    		'akhir_ts2',
    		'akhir_ts1',
    		'akhir_ts',
    		'jml_lulusan_sd_akhir_ts',
    		'rata_rata_masa_studi'
    ];
    public $timestamps = falsel;
}
