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
            $table->integer('total_harga');
            $table->integer('uang_bayar');
            $table->integer('kembalian')->default(0);
            $table->integer('diskon')->nullable()->default(0);
            $table->enum('tipe_diskon', ['Persentase', 'Rupiah'])->nullable();
            $table->enum('jenis', ['Satuan', 'Kilogram', 'Dus']);
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
        Schema::dropIfExists('orders');
    }
}
