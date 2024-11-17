<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(); // id column (bigint unsigned with auto increment)
            $table->unsignedBigInteger('product_id'); // product_id column (bigint, not nullable)
            $table->unsignedTinyInteger('size_id')->nullable(); // size_id column (tinyint, nullable)
            $table->unsignedTinyInteger('color_id')->nullable(); // color_id column (tinyint, nullable)
            $table->float('price')->nullable(); // price column (float, nullable)
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key constraint for product_id referencing products table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variations');
    }
};
