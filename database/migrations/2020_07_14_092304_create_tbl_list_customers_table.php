<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblListCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_list_customers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname','500');
            $table->string('phone_numer','50');
            $table->string('email','300');
            $table->string('address','1000');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('tbl_list_orders')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_list_customers');
    }
}
