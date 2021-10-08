<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmmhs3 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_mhs_bag3';
	protected $primaryKey = 'id_luaran_penelitian_bag3_mhs';
	protected $fillable = [

	'id_luaran_penelitian_bag3_mhs',
	'luaran_pkm',
	'tahun',
	'keterangan'
	];  
	
	public $timestamps = false;  
}
