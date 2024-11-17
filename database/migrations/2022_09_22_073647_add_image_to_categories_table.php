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
//        Schema::create('categories', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->tinyInteger('type_id')->nullable();
//            $table->tinyInteger('parent_id')->nullable();
//            $table->string('name');
//            $table->string('url', 100)->nullable();
//            $table->string('image')->nullable();
//            $table->tinyInteger('is_popular')->nullable();
//            $table->timestamps();
//        });
    }


    public function upOriginal()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
