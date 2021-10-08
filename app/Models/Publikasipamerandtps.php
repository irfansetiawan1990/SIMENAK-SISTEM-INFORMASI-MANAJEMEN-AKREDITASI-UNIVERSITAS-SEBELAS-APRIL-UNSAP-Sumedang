<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasipamerandtps extends Model
{
	    use HasFactory;
	    protected $table = 'publikasi_pameran_dtps';
	    protected $primaryKey = 'id_publikasi_pameran_dtps';
	    protected $fillable = 
	   [
	   		'id_publikasi_pameran_dtps',
	   		'jenis_publikasi',
	   		'ts2',
	   		'ts1',
	   		'ts',
	   		'jumlah'
	   
	   ];

	   public $timestamps = false;

}
