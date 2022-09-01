<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporarysalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporarysales', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->date('date');
            $table->integer('invoice_number');
            $table->string('client_name');
            $table->integer('clientPhNo');
            $table->string('product_code');
            $table->string('product_name');
            $table->integer('sale_price');
            $table->integer('quantity');
            $table->integer('total');
            $table->integer('discount')->default(0);
            $table->float('grand_total');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('temporarysales');
    }
}
