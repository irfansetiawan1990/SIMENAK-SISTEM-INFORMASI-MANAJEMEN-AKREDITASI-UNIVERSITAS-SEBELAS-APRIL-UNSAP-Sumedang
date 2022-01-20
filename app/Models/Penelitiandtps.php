<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitiandtps extends Model
{
    use HasFactory;
    protected $table = 'penelitian_dtps';
    protected $primaryKey = 'id_penelitian';
    protected $fillable = 
    [
    	'id_penelitian',
    	'sumber_pembiayaan',
    	'ts2',
    	'ts1',
    	'ts',
    	'jumlah',
        'prodi_id'
    ];
    public $timestamps = false;
}
