<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesesuaianbidkerlulusan extends Model
{
    use HasFactory;
    protected $table = 'kesesuaian_bidang_kerja_lulusan';
	protected $primaryKey = 'id_kbjl';
	protected $fillable = [
	'tahun_lulus',
	'jml_lulusan',
	'jml_terlacak',
	'rendah',
	'sedang',
	'tinggi',
	'prodi_id'

	];  
	
	public $timestamps = false;  
}
