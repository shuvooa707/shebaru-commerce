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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(); // id column (bigint unsigned with auto increment)
            $table->unsignedBigInteger('size_id'); // size_id column (tinyint, not nullable)
            $table->unsignedBigInteger('product_id'); // product_id column (bigint, not nullable)
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key constraint for product_id referencing products table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // Foreign key constraint for size_id referencing sizes table
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sizes');
    }
};
