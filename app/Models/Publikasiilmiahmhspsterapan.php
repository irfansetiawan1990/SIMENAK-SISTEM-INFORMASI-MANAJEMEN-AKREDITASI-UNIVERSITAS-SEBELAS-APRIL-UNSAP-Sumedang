<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasiilmiahmhspsterapan extends Model
{
	    use HasFactory;
	    protected $table = 'publikasi_ilmiah_mhs_ps_terapan';
	    protected $primaryKey = 'id_publikasi_ilmiah_mhs_ps_terapan';
	    protected $fillable = 
	   [
	   		'id_publikasi_ilmiah_mhs_ps_terapan',
	   		'jenis_publikasi',
	   		'ts2',
	   		'ts1',
	   		'ts',
	   		'jumlah'
	   
	   ];

	   public $timestamps = false;

}
