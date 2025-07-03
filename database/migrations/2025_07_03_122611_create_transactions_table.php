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
        $table->unsignedBigInteger('admin_id')->nullable(); // Optional if linked to admin
        $table->string('gateway'); // khalti, esewa, stripe, etc.
        $table->string('transaction_id')->nullable(); // token, PID, or refId
        $table->integer('amount'); // in paisa
        $table->string('status')->default('pending'); // success, failed, etc.
        $table->text('response')->nullable(); // full API response (JSON)
        $table->timestamps();

        $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
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
