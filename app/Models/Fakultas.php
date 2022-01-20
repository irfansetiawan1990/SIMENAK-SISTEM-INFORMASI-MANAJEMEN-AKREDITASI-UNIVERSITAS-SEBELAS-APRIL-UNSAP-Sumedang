<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{

    protected $table = 'tb_fakultas';
    protected $primaryKey ='id_fakultas';
    protected $fillable = [
        'nama_fak'
    ];
    
    public $timestamps = false;
  
   
}

