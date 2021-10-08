<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktutunggululusans1 extends Model
{
    use HasFactory;
    protected $table = 'waktu_tunggu_lulusan_d3';
    protected $primaryKey = 'id_tunggu_s1';
    protected $fillable = 
    [
    	'id_tunggu_s1',
    	'tahun_lulus',
    	'jml_lulusan',
    	'jml_terlacak',
    	'wt1',
    	'wt2',
    	'wt3',
    	
    ];
    public $timestamps = false;

}
