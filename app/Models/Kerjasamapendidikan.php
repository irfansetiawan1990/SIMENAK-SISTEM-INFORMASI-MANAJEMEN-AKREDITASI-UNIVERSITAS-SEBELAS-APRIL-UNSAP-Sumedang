<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasamapendidikan extends Model
{
    use HasFactory;
    protected $table = 'kerjasama_pendidikan';
	protected $primaryKey = 'id_kerjasamapendidikan';
	protected $fillable = [

	'id_kerjasamapendidikan',
	'lembaga_mitra',
	'tingkat',
	'judul_kegiatan_kerja',
	'manfaat',
	'waktu_durasi',
	'bukti_kerjasama',
	'tahun_berakhir_kjsm'
	];  
	public $timestamps = false;  
}
