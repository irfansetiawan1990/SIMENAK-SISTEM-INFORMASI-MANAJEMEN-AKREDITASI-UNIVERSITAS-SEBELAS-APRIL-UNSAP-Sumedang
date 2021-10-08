<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasamapkm extends Model
{
    use HasFactory;
    protected $table = 'kerjasama_pkm';
	protected $primaryKey = 'id_kjspkm';
	protected $fillable = [

	'id_kjspkm',
	'lembaga_mitra',
	'tingkat',
	'judul_kegiatan_kerja',
	'manfaat',
	'waktu_durasi',
	'bukti_kerjasama',
	'tahun_berakhir_kjs_pkm'
	];  
	public $timestamps = false;  
}
