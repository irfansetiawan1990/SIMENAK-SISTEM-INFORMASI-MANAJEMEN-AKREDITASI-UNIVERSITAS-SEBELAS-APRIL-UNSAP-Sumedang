<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasamapenelitian extends Model
{
    use HasFactory;
    protected $table = 'kerjasama_penelitian';
	protected $primaryKey = 'id_kjpl';
	protected $fillable = [
	'id_kjpl',
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
