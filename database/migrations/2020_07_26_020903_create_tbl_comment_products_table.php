<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCommentProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comment_products', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('comment');
            $table->unsignedBigInteger('com_id');
            $table->foreign('com_id')->references('id')->on('tbl_products')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_comment_products');
    }
}
