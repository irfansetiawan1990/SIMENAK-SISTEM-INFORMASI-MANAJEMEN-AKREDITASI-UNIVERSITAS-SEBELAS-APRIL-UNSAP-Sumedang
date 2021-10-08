<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempatkerjalulusan extends Model
{
    use HasFactory;
    protected $table = 'tempat_kerja_lulusan';
    protected $primaryKey = 'id_seleksi';
    protected $fillable = 
    [
    	'id_tempat_kerja_lulusan',
    	'tahun_lulus',
    	'jml_lulusan',
    	'jml_lulusan_terlacak',
    	'lokal',
    	'nasional',
    	'internasional'
    	
    ];
    public $timestamps = false;

}
