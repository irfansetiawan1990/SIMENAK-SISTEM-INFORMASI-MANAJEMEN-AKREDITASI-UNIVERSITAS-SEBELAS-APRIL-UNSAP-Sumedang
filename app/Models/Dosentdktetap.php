<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosentdktetap extends Model
{
    use HasFactory;
    protected $table ='dosen_tdk_tetap';
    protected $primariKey ='id_dosen_tdk_tetap';
    protected $fillable =['id_dosen_tdk_tetap','nama_dosen','pen_pas_sarjana','bid_keahlian','jabatan_akademik','serdikprof','serkomprof1','serkomprof2','kesesuaian_matkul'];
    public $timestamps = false;
}
