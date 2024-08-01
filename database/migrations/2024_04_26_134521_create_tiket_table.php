<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketTable extends Migration
{
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->id(); // id kolom dengan tipe unsignedBigInteger secara default
            $table->string('nama_tiket'); // kolom untuk menyimpan nama tiket
            $table->string('harga'); // kolom untuk menyimpan harga tiket
            $table->integer('stok'); // kolom untuk menyimpan jumlah stok tiket
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiket');
    }
}
