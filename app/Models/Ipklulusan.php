<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipklulusan extends Model
{
    use HasFactory;
    protected $table = 'ipk_lulusan';
    protected $primaryKey = 'id_ipk_lulusan';
    protected $fillable = 
    [

    	'tahun_lulus',
    	'jml_lulusan',
    	'minimal',
    	'rata_rata',
    	'maks',
        'prodi_id'
	];
	
	public $timestamps = false;
}
