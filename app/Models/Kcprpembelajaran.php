<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kcprpembelajaran extends Model
{
    use HasFactory;
    protected $table = 'kcpr_pembelejaran';
    protected $primariKey = 'id_kcpr_pembelajaran';
    protected $fillable = 
    [
    	'id_kcpr_pembelajaran',
    	'semester',
    	'kode_mata_kuliah',
    	'nama_matkul',
    	'matkul_kompetensi',
    	'kuliah_responsi_tutorial',
    	'seminar',
    	'praktikum_praktik_lapangan',
    	'konversi_kejam',
    	'sikap',
    	'pengetahuan',
    	'keterampilan_umum',
    	'keterampilan_khusus',
    	'dokumen_rencana_pembelajaran',
    	'unit_penyelenggara_pembelajara',
    	'unit_penyelenggara'
    	]

    public $timestamps = false;

    
}
