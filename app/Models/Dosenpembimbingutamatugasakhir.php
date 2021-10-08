<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosenpembimbingutamatugasakhir extends Model
{
    use HasFactory;
    protected $table ='dosen_pembimbing_utama_tugas_akhir';
    protected $primaryKey ='id_dosen_pembimbing';
    protected $fillable =['id_dosen_pembimbing','nama_dosen','ts2','ts1','ts','r1','ts_2','ts_1','ts_','r2','r3'];
    public $timestamps = false;
}
