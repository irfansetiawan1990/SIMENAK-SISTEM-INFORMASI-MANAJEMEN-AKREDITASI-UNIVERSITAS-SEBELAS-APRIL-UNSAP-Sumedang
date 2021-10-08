<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masastudilulusans1 extends Model
{
    use HasFactory;
    protected $table = 'masa_studi_lulusan_s1';
    protected $primaryKey = 'id_studi_lulusan_s1';
    protected $fillable =
    [
    		'id_studi_lulusan_s1',
    		'tahun_masuk',
    		'jml_mhs_diterima',
    		'akhir_ts6',
    		'akhir_ts5',
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
