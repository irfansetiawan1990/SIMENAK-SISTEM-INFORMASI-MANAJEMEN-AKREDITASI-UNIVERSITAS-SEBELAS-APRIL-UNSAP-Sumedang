<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{

    protected $table = 'tb_komentar';
    protected $primaryKey ='id_komen';
    protected $fillable = [
        'halaman_id',
        'user_id',
        'parent',
        'komentar'
    ];
    
  
  
   
}

