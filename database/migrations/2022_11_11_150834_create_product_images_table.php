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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->unsignedBigInteger('product_id'); // product_id column (unsigned bigint)
            $table->string('image')->nullable(); // image column (varchar), nullable
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key constraint if `products` table exists
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
        Schema::dropIfExists('product_images');
    }
};
