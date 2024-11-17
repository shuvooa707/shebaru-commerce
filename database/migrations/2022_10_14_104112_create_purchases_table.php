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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->smallInteger('supplier_id')->nullable(); // supplier_id column (smallint)
            $table->smallInteger('user_id')->nullable(); // user_id column (smallint)
            $table->text('note')->collate('utf8mb4_unicode_ci')->nullable(); // note column (text)
            $table->string('ref', 50)->collate('utf8mb4_unicode_ci')->nullable(); // ref column (varchar)
            $table->date('date')->nullable(); // date column
            $table->string('status', 30)->collate('utf8mb4_unicode_ci')->nullable(); // status column (varchar)
            $table->string('discount_type', 30)->collate('utf8mb4_unicode_ci')->nullable(); // discount_type column (varchar)
            $table->decimal('discount_amount', 10, 2)->nullable(); // discount_amount column (decimal)
            $table->decimal('shipping_cost', 10, 2)->nullable(); // shipping_cost column (decimal)
            $table->decimal('amount', 10, 2)->nullable(); // amount column (decimal)
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
        Schema::dropIfExists('purchases');
    }
};
