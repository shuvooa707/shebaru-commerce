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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(); // id column (bigint unsigned with auto increment)
            $table->string('business_name', 200)->nullable(); // business_name column (varchar 200, nullable)
            $table->string('first_name')->nullable(); // first_name column (varchar 255, not nullable)
            $table->string('last_name')->nullable(); // last_name column (varchar 255, not nullable)
            $table->string('email')->unique()->nullable(); // email column (varchar 255, unique, nullable)
            $table->string('username', 200)->unique()->nullable(); // username column (varchar 200, unique, nullable)
            $table->text('mobile')->nullable(); // mobile column (text, nullable)
            $table->timestamp('email_verified_at')->nullable(); // email_verified_at column (timestamp, nullable)
            $table->string('password')->nullable(); // password column (varchar 255, not nullable)
            $table->string('image')->nullable(); // image column (varchar 255, nullable)
            $table->string('remember_token', 100)->nullable(); // remember_token column (varchar 100, nullable)
            $table->boolean('status')->nullable(); // status column (tinyint(1), nullable)
            $table->boolean('is_seller')->nullable(); // is_seller column (tinyint(1), nullable)
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
        Schema::dropIfExists('users');
    }
};
