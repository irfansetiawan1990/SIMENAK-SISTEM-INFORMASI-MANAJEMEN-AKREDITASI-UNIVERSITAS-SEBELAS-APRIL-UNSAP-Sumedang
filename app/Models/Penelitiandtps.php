<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitiandtps extends Model
{
    use HasFactory;
    protected $table = 'penelitian_dtps';
    protected $primaryKey = 'id_penelitian_dtps';
    protected $fillable = 
    [
    	'id_penelitian_dtps',
    	'sumber_pembiayaan',
    	'ts2',
    	'ts1',
    	'ts',
    	'jumlah'
    ];
    public $timestamps = false;
}
