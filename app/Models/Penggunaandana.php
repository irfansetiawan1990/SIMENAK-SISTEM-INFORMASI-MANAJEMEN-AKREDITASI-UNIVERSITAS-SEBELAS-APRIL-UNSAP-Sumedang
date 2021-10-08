<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaandana extends Model
{
    use HasFactory;
    protected $table = 'penggunaan_dana';
    protected $primaryKey ='id_pengunaan_dana';
    protected $fillable = 
    [
    	'id_pengunaan_dana',
    	'ts2_pengelola',
    	'ts1_pengelola',
    	'ts_pengelola',
    	'rata-rata_pengelola',
    	'ts2_ps',
    	'ts1_ps',
    	'ts_ps'
    	'rata-rata_ps'
    ];
    public $timestamps = false;
}
