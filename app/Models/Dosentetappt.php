<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosentetappt extends Model
{
    use HasFactory;
    protected $table ='dosen_tetap_pt';
    protected $fillable =[
    'nama_dosen',
    'nidn',
    'pendidikan_pasca_sarjana',
    'bidang_keahlian',
    'kesesuaian_inti_ps',
    'jabatan_akademik',
    'sertifikat_pendik_prof',
    'sertifikat_kompetensi_prof',
    'matkul_ps_akre',
	'kesesuaian_bid_keahlian',
	'matkul_diampu_pslain',
    'prodi_id',
    'verifikasi'
	];
    public $timestamps = false;

    public function Matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}
