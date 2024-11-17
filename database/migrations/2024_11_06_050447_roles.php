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
//        Schema::create('roles', function (Blueprint $table) {
//            $table->id('id');
//            $table->string('name'); // name column (varchar 255)
//            $table->string('guard_name'); // guard_name column (varchar 255)
//
//            // Timestamps for created_at and updated_at columns
//            $table->timestamps();
//
//            // Primary key is automatically set on the 'id' column as it is set as big increments
//            // Unique key for the combination of name and guard_name
//            $table->unique(['name', 'guard_name']);
//        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
