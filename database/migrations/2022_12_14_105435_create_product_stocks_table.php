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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->unsignedBigInteger('product_id'); // product_id column (mediumint)
            $table->unsignedBigInteger('variation_id'); // variation_id column (mediumint)
            $table->decimal('quantity', 10, 2)->nullable(); // quantity column (decimal)
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key constraint if `products` and `variations` tables exist
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade'); // Assuming there is a variations table
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stocks');
    }
};
