<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->string('nama');
            $table->integer('harga');
            $table->integer('harga_modal');
            $table->integer('stok');
            $table->integer('diskon')->nullable()->default(0);
            $table->enum('tipe_diskon', ['Persentase', 'Rupiah', 'Tanpa Diskon'])->default('Tanpa Diskon');
            $table->enum('jenis', ['Satuan', 'Kilogram', 'Dus']);
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
