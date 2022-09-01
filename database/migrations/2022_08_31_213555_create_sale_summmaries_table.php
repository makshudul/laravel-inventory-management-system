<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleSummmariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_summmaries', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->date('date');
            $table->integer('invoice_number');
            $table->string('client_name');
            $table->integer('clientPhNo');
            $table->integer('grand_total_quantity');
            $table->integer('grand_total_amount');
            $table->integer('payment_amount');
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
        Schema::dropIfExists('sale_summmaries');
    }
}
