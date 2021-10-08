<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Daftarpsunipengelolaps extends Migration
{
    /**
     * Run the migrations.
     *

     */
      public function up()
        {
            Schema::create('Daftarpsunipengelolaprodi', function (Blueprint $table) {
              $table->id('id_ps');
              $table->string('jenis_program');
              $table->string('nama_ps');
              $table->string('status');
              $table->string('no_tgl_sk');
              $table->string('tgl_kadaluarsa');
              $table->string('jml_mhs_saat_ts');
              $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     *
 
     */
    public function down()
        {
            Schema::dropIfExists('Daftarpsunipengelolaprodi');
        }
    }
