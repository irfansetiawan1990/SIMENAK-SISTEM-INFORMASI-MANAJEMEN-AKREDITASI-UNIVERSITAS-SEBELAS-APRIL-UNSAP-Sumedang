<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosenpraktisi extends Model
{
    {
    use HasFactory;
    protected $table ='dosen_praktisi';
    protected $primariKey ='id_dosen_praktisi';
    protected $fillable =['id_dosen_praktisi','nama_dosen','nidk','perusahaan','pend_tertinggi','bid_keahlian','sertifikat','matkul_yg_diampu','bobot_kredit'];
    public $timestamps = false;
	}

}
