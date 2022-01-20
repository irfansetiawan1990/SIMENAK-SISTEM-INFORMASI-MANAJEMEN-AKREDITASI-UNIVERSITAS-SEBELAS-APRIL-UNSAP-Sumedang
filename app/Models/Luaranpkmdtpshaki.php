<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmdtpshaki extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_dtps_hki';
	protected $primaryKey = 'id_pkm_dtps_hki';
	protected $fillable = [

	'id_pkm_dtps_hki',
	'luaran_pkm',
	'tahun',
	'keterangan',
	'prodi_id'
	];  
	
	public $timestamps = false;  
}
