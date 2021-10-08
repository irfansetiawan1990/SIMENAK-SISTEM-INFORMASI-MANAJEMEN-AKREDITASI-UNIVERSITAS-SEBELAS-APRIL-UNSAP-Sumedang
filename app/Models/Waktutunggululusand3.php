<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktutunggululusand3 extends Model
{
    use HasFactory;
    protected $table = 'waktu_tunggu_lulusan_d3';
    protected $primaryKey = 'id_tunggu_d3';
    protected $fillable = 
    [
    	'id_tunggu_d3',
    	'tahun_lulus',
    	'jml_lulusan',
    	'jml_terlacak',
    	'jml_lulusan_dipesan',
    	'wt1',
    	'wt2',
    	'wt3',
    	
    ];
    public $timestamps = false;

}
