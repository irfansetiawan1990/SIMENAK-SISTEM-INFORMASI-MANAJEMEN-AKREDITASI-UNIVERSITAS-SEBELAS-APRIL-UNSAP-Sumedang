<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ewmp extends Model
{
    use HasFactory;
    protected $table = 'ewmp_dosen';
    protected $primaryKey = 'id_ewmp';
    protected $fillable = [
    'id_ewmp',
    'nama_dosen',
    'dtps',
    'ps_akreditasi',
    'ps_dalampt',
    'ps_luarpt',
    'penelitian',
    'pkm',
    'tugas_tambahan'
    ,'jml_sks'
    ,'rata_rata_persemester'
]
    protected $table = 'ewmp_dosen';
}
