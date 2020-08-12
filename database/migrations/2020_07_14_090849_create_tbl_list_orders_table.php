<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblListOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_list_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code','500')->nullable();
            $table->string('fullname','1000');
            $table->integer('order_number');//ko cho so dang sau
            $table->integer('total_price');
            $table->enum('status',['public','private','trash']);
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
        Schema::dropIfExists('tbl_list_orders');
    }
}
