<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmmhs1 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_mhs_bag1';
	protected $primaryKey = 'id_luaran_penelitian_bag1_mhs';
	protected $fillable = [

	'id_luaran_penelitian_bag1_mhs',
	'luaran_pkm',
	'tahun',
	'keterangan'
	];  
	
	public $timestamps = false;  
}
