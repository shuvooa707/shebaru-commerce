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
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->string('code', 255); // code column (varchar 255)
            $table->decimal('amount', 8, 2); // amount column (decimal with 8 digits and 2 decimals)
            $table->date('start')->nullable(); // start column (date, nullable)
            $table->date('end')->nullable(); // end column (date, nullable)
            $table->tinyInteger('status')->nullable(); // status column (tinyint, nullable)
            $table->string('discount_type', 40)->nullable(); // discount_type column (varchar 40, nullable)
            $table->decimal('minimum_amount', 8, 2)->default(0.00); // minimum_amount column (decimal, default 0.00)
            $table->timestamps(); // created_at and updated_at timestamps
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
