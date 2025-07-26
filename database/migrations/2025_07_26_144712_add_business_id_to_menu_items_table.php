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
        Schema::table('menu_items', function (Blueprint $table) {
        $table->foreignId('business_id')->constrained()->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('menu_items', function (Blueprint $table) {
        $table->dropForeign(['business_id']);
        $table->dropColumn('business_id');
    });
}
 
};
