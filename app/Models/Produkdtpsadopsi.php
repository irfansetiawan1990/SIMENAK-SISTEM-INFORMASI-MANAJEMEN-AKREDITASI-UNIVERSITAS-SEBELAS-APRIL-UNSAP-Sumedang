<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkdtpsadopsi extends Model
{
	    use HasFactory;
	
	    protected $table = 'produk_dtps_yg_diadopsi';
	    protected $primaryKey = 'id_produk';
	    protected $fillable = 
	   [
	   		'id_produk',
	   		'nama_dosen',
	   		'nama_produk',
	   		'deskripsi_produk',
	   		'bukti',
	   		'tahun'
	   ];

	   public $timestamps = false;
	}

