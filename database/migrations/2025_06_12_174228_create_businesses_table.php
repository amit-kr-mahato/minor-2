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
    Schema::create('businesses', function (Blueprint $table) {
        $table->id();
        $table->string('province');
        $table->string('business_name');
        $table->string('address1');
        $table->string('address2')->nullable();
        $table->string('city');
        $table->string('postal_code');
        $table->string('phone');
        $table->string('web_address')->nullable();
        $table->string('email');
        $table->json('categories'); // store as JSON array
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
        Schema::dropIfExists('businesses');
    }
};
