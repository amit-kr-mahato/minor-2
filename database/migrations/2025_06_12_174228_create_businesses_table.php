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
        $table->foreignId('user_id'); // owner
        $table->string('province');
        $table->string('business_name');
        $table->string('address1');
        $table->string('address2')->nullable();
        $table->string('city');
        $table->string('postal_code');
        $table->decimal('longitude', 10, 8)->nullable(); // Longitude column
        $table->decimal('latitude', 10, 8)->nullable(); 
        $table->string('phone');
        $table->string('web_address')->nullable();
          $table->enum('status', ['active', 'pending', 'suspended'])->default('pending');
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
