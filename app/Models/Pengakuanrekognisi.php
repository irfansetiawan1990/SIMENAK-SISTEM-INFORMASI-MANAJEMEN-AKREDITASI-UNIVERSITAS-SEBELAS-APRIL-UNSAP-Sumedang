<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengakuanrekognisi extends Model
{
	    use HasFactory;
	    protected $table = 'rekognisidtps';
	    protected $primaryKey = 'id_rekognisi_dtps';
	    protected $fillable = 
	   [
	   		'id_pengakuan',
	   		'rekognisi_bukti',
	   		'wilayah',
	   		'nasional',
	   		'internasional',
	   		'tahun'
	   
	   ];

	   public $timestamps = false;

}
