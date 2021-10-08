<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmmhs4 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_mhs_bag4';
	protected $primaryKey = 'id_luaran_penelitian_bag4_mhs';
	protected $fillable = [

	'id_luaran_penelitian_bag4_mhs',
	'luaran_pkm',
	'tahun',
	'keterangan'
	];  
	
	public $timestamps = false;  
}

