<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmdtpshaki2 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_dtps_hki2';
	protected $primaryKey = 'id_pkm_dtps_haki2';
	protected $fillable = [

	'id_pkm_dtps_haki2',
	'luaran_pkm',
	'tahun',
	'keterangan',
	'prodi_id'
	];  
	
	public $timestamps = false;  
}
