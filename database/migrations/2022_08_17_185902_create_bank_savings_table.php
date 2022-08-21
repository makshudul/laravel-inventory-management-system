<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_savings', function (Blueprint $table) {
            $table->id();
            $table->integer('bankId');
            $table->date('date');
            $table->string('purpose');
            $table->string('spender');
            $table->integer('debit')->nullable();
            $table->integer('credit')->nullable();
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
        Schema::dropIfExists('bank_savings');
    }
}
