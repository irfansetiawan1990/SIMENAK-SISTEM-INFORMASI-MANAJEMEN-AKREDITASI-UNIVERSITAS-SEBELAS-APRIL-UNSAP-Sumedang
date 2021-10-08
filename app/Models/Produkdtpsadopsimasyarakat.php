<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkdtpsadopsimasyarakat extends Model
{
	    use HasFactory;
	    protected $table = 'produk_dtps_mhs_diadopsi';
	    protected $primaryKey = 'id_produk_mhs';
	    protected $fillable = 
	   [
	   		'id_produk_mhs',
	   		'nama_mhs',
	   		'nama_produk',
	   		'deskripsi_produk',
	   		'bukti',
	   		'tahun'
	   ];

	   public $timestamps = false;

}
