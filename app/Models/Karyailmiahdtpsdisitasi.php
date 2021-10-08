<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyailmiahdtpsdisitasi extends Model
{
    use HasFactory;
    protected $table = 'karya_ilmiah_dtps_disitasi';
    protected $primariKey = 'id_karya_ilmiah';
    protected $fillable = [
		'id_karya_ilmiah',
		'nama_dosen', 
		'judul_artikel_disitasi', 
		'jumlah_sitasi'
    ];
    public $timestamps = false;
}
