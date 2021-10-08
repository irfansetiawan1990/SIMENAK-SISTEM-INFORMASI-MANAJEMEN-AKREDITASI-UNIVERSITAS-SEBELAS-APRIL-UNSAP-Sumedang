<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    use HasFactory;
    protected $table = 'tb_prodi';
    protected $fillable = 
   [
   'kode_prodi',
   'nama_prodi'
   ];

   public $timestamps = false;

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
