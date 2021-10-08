<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekognisidtps extends Model
{
	    use HasFactory;
	    protected $table = 'rekognisidtps';
	    protected $primaryKey = 'id_rekognisi_dtps';
	    protected $fillable = 
	   [
	   		'id_rekognisi_dtps',
	   		'nama_dosen',
	   		'bidang_keahlian',
	   		'rekognisi_bukti',
	   		'ts',
	   		'jumlah'
	   
	   ];

	   public $timestamps = false;

}
