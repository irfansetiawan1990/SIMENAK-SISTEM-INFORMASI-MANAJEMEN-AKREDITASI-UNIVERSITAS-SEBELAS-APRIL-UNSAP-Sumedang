<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmdtps4 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_dtps_bag4_ebook';
	protected $primaryKey = 'id_pkm_dtps_bag4';
	protected $fillable = [

	'id_pkm_dtps_bag4',
	'luaran_pkm,'
	'tahun',
	'keterangan',
	];  
	
	public $timestamps = false;  
}
