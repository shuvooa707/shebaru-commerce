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
        Schema::create('social_icons', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(); // id column (bigint unsigned with auto increment)
            $table->string('title'); // title column (varchar 255, not nullable)
            $table->string('link')->nullable(); // link column (varchar 255, nullable)
            $table->string('image')->nullable(); // image column (varchar 255, nullable)
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
        Schema::dropIfExists('social_icons');
    }
};
