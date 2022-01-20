<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmdtpshaki4 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_dtps_hki4';
	protected $primaryKey = 'id_pkm_dtps_haki4';
	protected $fillable = [

	'id_pkm_dtps_haki4',
	'luaran_pkm',
	'tahun',
	'keterangan',
	'prodi_id'

	];  
	
	public $timestamps = false;  
}
