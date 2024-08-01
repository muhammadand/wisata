<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id kolom dengan tipe unsignedBigInteger secara default
            $table->unsignedBigInteger('tiket_id'); // kunci asing yang merujuk ke tabel tiket
            $table->integer('quantity'); // kolom untuk menyimpan jumlah pesanan
            $table->decimal('total_harga', 10, 2)->nullable(); // kolom untuk menyimpan total harga, diatur sebagai nullable
            $table->timestamps(); // kolom created_at dan updated_at

            // Menambahkan kunci asing
            $table->foreign('tiket_id')->references('id')->on('tiket')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
