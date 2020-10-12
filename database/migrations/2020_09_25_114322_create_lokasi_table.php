<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id')->unsigned();
            $table->string('nama_tempat');
            $table->double('lat');
            $table->double('longt');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('list_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasi');
    }
}
