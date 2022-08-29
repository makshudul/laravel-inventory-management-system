<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->string('company_id');
            $table->date('date');
            $table->integer('totalQuantity');
            $table->integer('less_amount');
            $table->float('grand_total');
            $table->string('payment');
            $table->integer('due_amount');
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
        Schema::dropIfExists('purchase_summaries');
    }
}
