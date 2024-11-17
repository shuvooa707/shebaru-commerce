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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->unsignedBigInteger('product_id'); // product_id column (unsigned bigint)
            $table->text('message')->nullable(); // message column (text), nullable
            $table->string('name')->nullable(); // name column (varchar), nullable
            $table->decimal('review', 4, 0)->default(0); // review column (decimal with 4 digits, no decimal points)
            $table->mediumInteger('user_id')->nullable(); // user_id column (mediumint), nullable
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
        //
    }
};
