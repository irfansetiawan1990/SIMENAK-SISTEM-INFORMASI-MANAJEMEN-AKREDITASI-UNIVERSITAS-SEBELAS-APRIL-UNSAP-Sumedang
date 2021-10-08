<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyailmiahmhsdisitasi extends Model
{
    use HasFactory;
    protected $table = 'karya_ilmiah_mhs_yg_disitasi';
    protected $primariKey = 'id_mhs_yg_disitasi';
    protected $fillable = ['id_mhs_yg_disitasi',
		'nama_mhs',
		'judul_artikel_yg_disitasi',
		'jml_sitasi'];
	public $timestamps = false;


