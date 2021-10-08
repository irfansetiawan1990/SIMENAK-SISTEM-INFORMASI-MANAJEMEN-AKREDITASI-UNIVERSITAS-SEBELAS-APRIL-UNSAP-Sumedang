<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ref8E2 extends Model
{
	    use HasFactory;
	    protected $table = 'ref_8e2';
	    protected $primaryKey = 'id_ref8e2';
	    protected $fillable = 
	   [
	   		'id_ref8e2',
	   		'tahun_lulus',
	   		'jumlah_lulusan',
	   		'jumlah_tanggapan'
	   
	   ];

	   public $timestamps = false;

}
