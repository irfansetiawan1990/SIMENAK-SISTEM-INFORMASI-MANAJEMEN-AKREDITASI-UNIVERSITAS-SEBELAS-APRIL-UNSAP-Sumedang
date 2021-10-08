<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table ='tb_matkul';
    protected $primaryKey = 'id';
    protected $fillable =
    [
    'id',
    'kode_matkul',
    'nama_matkul'

	];
    public $timestamps = false;

    public function dosentetappt()
    {
        return $this->hasMany(Dosentetappt::class);
    }
}
