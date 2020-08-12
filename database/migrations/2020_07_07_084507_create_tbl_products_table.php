<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name','200');
            $table->string('product_code','200');
            $table->integer('price_old');
            $table->integer('price_new');
            $table->text('product_desc');
            $table->text('product_thumb');
            $table->text('product_content');
            $table->integer('product_qty');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('tbl_product_cats')->onDelete('cascade');
            //$table->text('status_product');
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
        Schema::dropIfExists('tbl_products');
    }
}
