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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign key to orders table
            $table->unsignedMediumInteger('product_id'); // product_id column (mediumint)
            $table->decimal('quantity', 5, 2)->nullable(); // quantity column (decimal)
            $table->unsignedMediumInteger('variation_id')->nullable(); // variation_id column (mediumint)
            $table->decimal('unit_price', 10, 2)->default(0.00); // unit_price column (decimal)
            $table->decimal('discount', 10, 2)->default(0.00); // discount column (decimal)
            $table->tinyInteger('is_stock')->nullable(); // is_stock column (tinyint)
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
        Schema::dropIfExists('order_details');
    }
};
