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
        Schema::create('purchase_lines', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->unsignedBigInteger('purchase_id')->unsigned(); // purchase_id column (bigint)
            $table->unsignedBigInteger('variation_id'); // variation_id column (smallint)
            $table->unsignedBigInteger('product_id'); // product_id column (mediumint)
            $table->decimal('quantity', 10, 2)->nullable(); // quantity column (decimal)
            $table->decimal('unit_price', 10, 2)->nullable(); // unit_price column (decimal)
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key constraints if necessary
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_lines');
    }
};
