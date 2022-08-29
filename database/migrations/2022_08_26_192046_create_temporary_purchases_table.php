<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->string('company_name');
            $table->string('company_id');
            $table->string('date');
            $table->string('invoice_number');
            $table->string('product_code');
            $table->string('product_name');
            $table->integer('cost_price');
            $table->integer('stock')->nullable();
            $table->integer('product_quantity');
            $table->float('product_total');
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
        Schema::dropIfExists('temporary_purchases');
    }
}
