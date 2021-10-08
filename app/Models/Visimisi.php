<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    use HasFactory;
    Protected $table = 'vmts';
    Protected $fillable = ['id','visimisi','tahun_awal','tahun_akhir','prodi_id'];
    Public $timestamps = false;
}
