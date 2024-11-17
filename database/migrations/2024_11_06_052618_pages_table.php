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
        Schema::create('pages', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->string('page', 255)->nullable(); // page column (varchar)
            $table->string('title', 255)->nullable(); // title column (varchar)
            $table->longText('body')->nullable(); // body column (longtext)
            $table->timestamps(); // created_at and updated_at columns
        });
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
