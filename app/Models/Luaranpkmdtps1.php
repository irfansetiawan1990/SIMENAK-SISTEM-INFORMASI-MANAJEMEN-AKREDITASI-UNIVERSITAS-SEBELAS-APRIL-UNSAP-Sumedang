<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmdtps1 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_dtps_bag1_HKI';
	protected $primaryKey = 'id_pkm_dtps_bag1';
	protected $fillable = [

	'id_pkm_dtps_bag1',
	'luaran_pkm',
	'tahun',
	'keterangan',
	];  
	
	public $timestamps = false;  
}
