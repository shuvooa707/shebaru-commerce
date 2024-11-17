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
        Schema::create('delivery_charges', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->string('title', 255); // title column (varchar 255, not nullable)
            $table->decimal('amount', 8, 2); // amount column (decimal with 8 digits total, 2 decimal places)
            $table->tinyInteger('status')->nullable(); // status column (tinyint, nullable)
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
