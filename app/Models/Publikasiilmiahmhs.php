<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasiilmiahmhs extends Model
{
	    use HasFactory;
	    protected $table = 'publikasi_ilmiah_mhs';
	    protected $primaryKey = 'id_publikasi_ilmiah_mhs';
	    protected $fillable = 
	   [
	   		'id_publikasi_ilmiah_mhs',
	   		'jenis_publikasi',
	   		'ts2',
	   		'ts1',
	   		'ts',
	   		'jumlah'
	   
	   ];

	   public $timestamps = false;

}
