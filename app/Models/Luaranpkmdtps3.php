<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmdtps3 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_dtps_bag3_tekno';
	protected $primaryKey = 'id_pkm_dtps_bag3';
	protected $fillable = [

	'id_pkm_dtps_bag3',
	'luaran_pkm,'
	'tahun',
	'keterangan',
	];  
	
	public $timestamps = false;  
}
