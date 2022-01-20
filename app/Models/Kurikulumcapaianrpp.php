<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulumcapaianrpp extends Model
{

    protected $table = 'kurikulum_capaian_rpp';
    protected $primaryKey = 'id_kurikulum_capaian_rpp';
    protected $fillable = [  
            'id_kurikulum_capaian_rpp',
             'matkul_id',         
             'matkul_komp',         
             'kuliah_responsi_tutor',         
             'seminar',         
             'praktik',         
             'konversi',         
             'cpl_sikap',         
             'cpl_pengetahuan',         
             'cpl_keterampilan_umum',         
             'cpl_keterampilan_khusus',         
             'dokumen_rencana_pembelajaran',         
             'unit_penyelenggara',         
             'prodi_id'         
    ];
    
    public $timestamps = false;
  
   
}

