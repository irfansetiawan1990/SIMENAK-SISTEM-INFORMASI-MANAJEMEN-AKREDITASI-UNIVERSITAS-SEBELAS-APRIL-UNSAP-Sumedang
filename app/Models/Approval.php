<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $table = 'tb_approval';
    protected $primaryKey = 'id';
    protected $fillable = [
        'approval'
  
];


    public function user(){
    return $this->hasOne(user::class);
    }
    
}
