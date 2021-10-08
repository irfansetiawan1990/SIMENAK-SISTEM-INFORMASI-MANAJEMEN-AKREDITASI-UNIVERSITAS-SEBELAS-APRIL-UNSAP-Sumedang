<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasiilmiahdtps extends Model
{
	    use HasFactory;
	    protected $table = 'publikasi_ilmiah_dtps';
	    protected $primaryKey = 'id_publikasi';
	    protected $fillable = 
	   [
	   		'id_publikasi_ilmiah_dtps',
	   		'jenis_publikasi',
	   		'ts2',
	   		'ts1',
	   		'ts',
	   		'jumlah'
	   
	   ];

	   public $timestamps = false;

}
