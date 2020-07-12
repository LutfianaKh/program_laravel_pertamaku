<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelas extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kelas', 20);
            $table->timestamps();
        });

        //set FK dikolom id_kelas di tabel mahasiswa
        schema::table('mahasiswa', function(Blueprint $table){
            $table->foreign('id_kelas')
                ->references('id')
                ->on('kelas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
