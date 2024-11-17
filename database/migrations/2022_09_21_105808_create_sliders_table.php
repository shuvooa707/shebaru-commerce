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
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(); // id column (bigint unsigned with auto increment)
            $table->string('image')->nullable(); // image column (varchar 255, nullable)
            $table->string('mobile_image')->nullable(); // mobile_image column (varchar 255, nullable)
            $table->timestamps(); // created_at and updated_at columns

            $table->string('title')->nullable(); // title column (varchar 255, nullable)
            $table->string('link')->nullable(); // link column (varchar 255, nullable)
            $table->string('description')->nullable(); // description column (varchar 255, nullable)
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
