<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIbukandung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibukandung', function (Blueprint $table) {
            $table->integer('id_biodata')->unsigned()->primary('id_biodata');
            $table->string('nama_ibukandung')->unique();
            $table->timestamps();

            $table->foreign('id_biodata')
                ->references('id')->on('biodata')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ibukandung');
    }
}
