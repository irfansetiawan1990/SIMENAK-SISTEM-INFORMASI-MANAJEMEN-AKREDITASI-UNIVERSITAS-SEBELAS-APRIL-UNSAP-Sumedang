<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesesuaianbidkerlulusan extends Model
{
    use HasFactory;
    protected $table = 'kesesuaian_bidang_kerja_lulusan';
	protected $primaryKey = 'id_kesesuaian_bidang_kerja_lulusan';
	protected $fillable = [

	'id_kesesuaian_bidang_kerja_lulusan,'
	'tahun_lulus',
	'jml_lulusan',
	'jml_lulusan_terlacak',
	'jml_lulusan_terlacak_rendah',
	'jml_lulusan_terlacak_sedang',
	'jml_lulusan_terlacak_tinggi',
	];  
	
	public $timestamps = false;  
}
