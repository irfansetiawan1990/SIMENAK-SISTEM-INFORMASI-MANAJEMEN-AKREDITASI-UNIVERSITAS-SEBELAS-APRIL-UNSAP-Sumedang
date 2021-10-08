<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    protected $table = 'tb_mhs';
    protected $primaryKey = 'id_mhs';
    protected $fillable = ['id_mhs','nama','nim','prodi'];
    public 	  $timestamps = false;
}
