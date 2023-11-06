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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('path');
            $table->string('hash_name');
            $table->string('original_name');
            $table->string('size');
            $table->foreignId('user_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function($table) {
            $table->dropColumn('path');
            $table->dropColumn('hash_name');
            $table->dropColumn('original_name');
            $table->dropColumn('size');
            $table->dropForeign('user_id');
            
        });
    }
};
