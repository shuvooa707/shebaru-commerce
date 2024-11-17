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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(); // id column (bigint unsigned with auto increment)
            $table->string('name'); // name column (varchar 255, not nullable)
            $table->string('mobile', 30); // mobile column (varchar 30, not nullable)
            $table->string('email')->nullable(); // email column (varchar 255, nullable)
            $table->string('address')->nullable(); // address column (varchar 255, nullable)
            $table->string('contact_id')->nullable(); // contact_id column (varchar 255, nullable)
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
        Schema::dropIfExists('suppliers');
    }
};
