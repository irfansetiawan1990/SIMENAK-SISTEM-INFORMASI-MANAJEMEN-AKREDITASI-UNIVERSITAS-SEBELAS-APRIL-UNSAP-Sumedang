<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkmdtps extends Model
{
    use HasFactory;
    protected $table = 'pkm_dtps';
    protected $primaryKey = 'id_pkm_dtps';
    protected $fillanle = 
    [
        'id_pkm_dtps',
        'sumber_pembiayaan',
        'ts2',
        'ts1',
        'ts',
        'jumlah'
    ];
    public $timestamps = false;
}
