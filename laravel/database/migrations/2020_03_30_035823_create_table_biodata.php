<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBiodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nim', 15)->unique();
            $table->string('nama', 50);
            $table->string('prodi', 25);
            $table->date('tanggal_lahir');
            $table->string('alamat', 50);
            $table->string('hobi', 20);
            $table->string('quote', 100);
            $table->integer('id_kelas')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}
