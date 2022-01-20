<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempatkerjalulusan extends Model
{
    use HasFactory;
    protected $table = 'tempat_kerja_lulusan';
    protected $primaryKey = 'id_tkl';
    protected $fillable = 
    [
    	'tahun_lulus',
    	'jml_lulusan',
    	'jml_terlacak',
    	'lokal',
    	'nasional',
    	'internasional',
        'prodi_id'
    	
    ];
    public $timestamps = false;

}
