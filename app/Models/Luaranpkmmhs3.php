<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luaranpkmmhs3 extends Model
{
    use HasFactory;
    protected $table = 'luaran_pkm_mhs3';
	protected $primaryKey = 'id_pkm_mhs3';
	protected $fillable = [
	'luaran_pkm',
	'tahun',
	'keterangan',
	'prodi_id'
	];  
	
	public $timestamps = false;  
}
