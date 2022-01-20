<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmmhs4 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_mhs4';
	protected $primaryKey = 'id_pkm_mhs4';
	protected $fillable = [
	'luaran_pkm',
	'tahun',
	'keterangan',
	'prodi_id'

	];  
	
	public $timestamps = false;  
}
