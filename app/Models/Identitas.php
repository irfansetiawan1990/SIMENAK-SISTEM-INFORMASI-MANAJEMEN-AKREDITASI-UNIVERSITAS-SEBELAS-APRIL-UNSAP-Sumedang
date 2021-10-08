<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Identitas extends Model
{
    use HasFactory;
    protected $table ="tb_identitas"; //meh teu make s
    protected $primaryKey = 'id';
    protected $fillable =[
    	     "nama_prodi",
           "jenis_program",
           "peringkat_akre_ps",
           "no_sk_bnpt",
           "tgl_kadaluarsa",
           "nama_unit_pengelola",
           "nama_pt",
           "alamat",
           "kota",
           "kabupaten",
           "no_tlp",
           "email",
           "website",
           "ts"
    ];
      public $timestamps = false;
}
