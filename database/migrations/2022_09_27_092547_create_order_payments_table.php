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
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign key to orders table
            $table->string('method', 50)->default('cash'); // method column (varchar)
            $table->decimal('amount', 10, 2)->default(0.00); // amount column (decimal)
            $table->date('date')->nullable(); // date column (date)
            $table->string('account_no')->nullable(); // account_no column (varchar)
            $table->string('tnx_id', 100)->nullable(); // tnx_id column (varchar)
            $table->string('email', 200)->nullable(); // email column (varchar)
            $table->string('name', 200)->nullable(); // name column (varchar)
            $table->text('note')->nullable(); // note column (text)
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
        Schema::dropIfExists('order_payments');
    }
};
