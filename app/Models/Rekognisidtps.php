<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekognisidtps extends Model
{
	    use HasFactory;
	    protected $table = 'rekognisi_dtps';
	    protected $primaryKey = 'id_rekognisi';
	    protected $fillable = 
	   [
	   		'id_rekognisi',
	   		'nama_dosen',
	   		'bidang_keahlian',
	   		'rkg_bkt_pendukung',
	   		'wilayah',
	   		'nasional',
	   		'internasional',
	   		'tahun',
	   		'prodi_id'
	   
	   ];

	   public $timestamps = false;

}
