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
        Schema::create('combo_products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(); // id column (bigint unsigned with auto increment)
            $table->unsignedBigInteger('combo_id'); // combo_id column (smallint, not nullable)
            $table->unsignedBigInteger('product_id'); // product_id column (mediumint, not nullable)
            $table->unsignedBigInteger('size_id'); // size_id column (tinyint, not nullable)
            $table->decimal('quantity', 8, 2)->default(0.00); // quantity column (decimal, default 0.00)
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key constraint for product_id referencing products table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // Foreign key constraint for size_id referencing sizes table
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            // Foreign key constraint for combo_id referencing combo table
            $table->foreign('combo_id')->references('id')->on('combos')->onDelete('cascade');
        });
    }


    public function upOriginal()
    {
        Schema::create('combo_products', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('combo_id');
            $table->mediumInteger('product_id');
            $table->tinyInteger('size_id');
            $table->decimal('quantity')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combo_products');
    }
};
