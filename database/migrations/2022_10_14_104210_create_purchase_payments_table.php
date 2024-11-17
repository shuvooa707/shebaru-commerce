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
        Schema::create('purchase_payments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->unsignedBigInteger('purchase_id'); // purchase_id column (mediumint)
            $table->date('date')->nullable(); // date column
            $table->string('method', 30)->collate('utf8mb4_unicode_ci')->nullable(); // method column (varchar)
            $table->string('note', 255)->collate('utf8mb4_unicode_ci')->nullable(); // note column (varchar)
            $table->decimal('amount', 10, 2)->default('0.00'); // amount column (decimal)
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key constraint if necessary
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_payments');
    }
};
