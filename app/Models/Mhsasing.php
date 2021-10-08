<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mhsasing extends Model
{
    use HasFactory;
    protected $table = 'mhs_asing';
    protected $primaryKey = 'id_mhs_asing';
    protected $fillable = 
    [
    	'id_mhs_asing',
    	'ps_program_studi',
             'ts2',
           'ts1',
           'ts',
           'ts2_1',
           'ts1_1',
           'ts_1',
           'ts2_2',
           'ts1_2',
           'ts_2'
    ];
    public $timestamps = false;
}
