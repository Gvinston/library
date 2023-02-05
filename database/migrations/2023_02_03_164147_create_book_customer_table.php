<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_customer', function (Blueprint $table) {
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('customer_id');

            $table->primary(['book_id', 'customer_id']);

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_customer');
    }
}
