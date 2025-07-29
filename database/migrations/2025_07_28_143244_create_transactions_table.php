<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('pidx')->nullable();
        $table->string('transaction_id')->nullable();
        $table->string('tidx')->nullable();
        $table->string('txn_id')->nullable();
        $table->integer('amount')->nullable();
        $table->integer('total_amount')->nullable();
        $table->string('mobile')->nullable();
        $table->string('status')->nullable();
        $table->foreignId('user_id'); // owner
        $table->string('purchase_order_id')->nullable();
        $table->string('purchase_order_name')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
