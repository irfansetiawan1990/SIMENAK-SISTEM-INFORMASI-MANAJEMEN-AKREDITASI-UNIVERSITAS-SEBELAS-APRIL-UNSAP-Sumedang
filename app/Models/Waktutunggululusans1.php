<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktutunggululusans1 extends Model
{
    use HasFactory;
    protected $table = 'waktu_tunggu_lulus_s1';
    protected $primaryKey = 'id_tunggu_lulusan';
    protected $fillable = 
    [
    	'tahun_lulus',
    	'jml_lulusan',
    	'jml_terlacak',
    	'wt1',
    	'wt2',
    	'wt3',
        'prodi_id'
    	
    ];
    public $timestamps = false;

}
