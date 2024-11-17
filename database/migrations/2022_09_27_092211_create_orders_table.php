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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto-incrementing id
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('invoice_no', 100)->nullable(); // invoice_no column (varchar)
            $table->text('shipping_address')->nullable(); // shipping_address column (text)
            $table->string('ip_address')->nullable(); // ip_address column (varchar)
            $table->integer('area_id')->nullable(); // area_id column (integer)
            $table->string('area_name')->nullable(); // area_name column (varchar)
            $table->string('city', 100)->nullable(); // city column (varchar)
            $table->string('state', 100)->nullable(); // state column (varchar)
            $table->string('zip_code', 100)->nullable(); // zip_code column (varchar)
            $table->string('first_name', 200)->nullable(); // first_name column (varchar)
            $table->string('last_name', 200)->nullable(); // last_name column (varchar)
            $table->string('mobile', 50)->nullable(); // mobile column (varchar)
            $table->string('email', 200)->nullable(); // email column (varchar)
            $table->date('date')->nullable(); // date column (date)
            $table->string('payment_status', 50)->default('due'); // payment_status column (varchar)
            $table->string('status', 50)->default('pending'); // status column (varchar)
            $table->decimal('amount', 10, 2)->default(0.00); // amount column (decimal)
            $table->decimal('tax', 10, 2)->default(0.00); // tax column (decimal)
            $table->decimal('discount', 10, 2)->default(0.00); // discount column (decimal)
            $table->decimal('final_amount', 10, 2)->default(0.00); // final_amount column (decimal)
            $table->tinyInteger('delivery_charge_id')->nullable(); // delivery_charge_id column (tinyint)
            $table->decimal('shipping_charge', 10, 2)->default(0.00); // shipping_charge column (decimal)
            $table->tinyInteger('delivery_type')->nullable(); // delivery_type column (tinyint)
            $table->text('note')->nullable(); // note column (text)
            $table->tinyInteger('courier_id')->nullable(); // courier_id column (tinyint)
            $table->string('courier_tracking_id')->nullable(); // courier_tracking_id column (varchar)
            $table->mediumInteger('assign_user_id')->nullable(); // assign_user_id column (mediumint)
            $table->string('store_id')->nullable(); // store_id column (varchar)
            $table->string('weight')->nullable(); // weight column (varchar)
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
        Schema::dropIfExists('orders');
    }
};
