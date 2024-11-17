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
        Schema::create('couriers', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->string('name', 255)->nullable(); // name column (varchar 255, nullable)
            $table->string('phone', 30)->nullable(); // phone column (varchar 30, nullable)
            $table->string('email', 255)->nullable(); // email column (varchar 255, nullable)
            $table->text('address')->nullable(); // address column (text, nullable)
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }



    public function upOriginal()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone',30)->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('couriers');
    }
};
