<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipklulusan extends Model
{
    use HasFactory;
    protected $table = 'ipk_lulusan';
    protected $primaryKey = 'id_ipk_lulusan';
    protected $fillable = 
    [
    	'id_ipk_lulusan',
    	'tahun_lulus',
    	'jml_lulusan',
    	'min',
    	'rata_rata',
    	'maks'
	];
	
	public $timestamps = false;
}
