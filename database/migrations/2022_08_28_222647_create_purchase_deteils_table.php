<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDeteilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_deteils', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('branch_name');
            $table->string('company_name');
            $table->date('date');
            $table->string('company_invoice');
            $table->string('product_code');
            $table->integer('cost_price');
            $table->integer('stock')->nullable();
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->integer('product_total');
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
        Schema::dropIfExists('purchase_deteils');
    }
}
