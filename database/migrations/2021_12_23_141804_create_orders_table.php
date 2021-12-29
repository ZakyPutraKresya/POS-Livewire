<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('product_id');
            $table->string('nama_product');
            $table->unsignedBigInteger('customer_id');
            $table->string('jumlah');
            $table->integer('harga_beli');
            $table->integer('total_harga');
            $table->integer('uang_bayar');
            $table->integer('kembalian')->default(0);
            $table->string('jumlah_diskon');
            $table->enum('jenis_diskon', ['Persentase', 'Rupiah', 'Tanpa Diskon']);
            $table->string('tanggal_pembelian');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
