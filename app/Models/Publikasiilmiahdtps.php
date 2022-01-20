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
	   		'id_publikasi',
	   		'media_publikasi',
	   		'ts2',
	   		'ts1',
	   		'ts',
	   		'prodi_id'
	   
	   ];

	   public $timestamps = false;

}
