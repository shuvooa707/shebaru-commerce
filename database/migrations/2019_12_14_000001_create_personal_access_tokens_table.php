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
//        Schema::create('personal_access_tokens', function (Blueprint $table) {
//            $table->id(); // Auto-incrementing id
//            $table->string('tokenable_type'); // tokenable_type column (varchar)
//            $table->unsignedBigInteger('tokenable_id'); // tokenable_id column (unsigned bigint)
//            $table->string('name'); // name column (varchar)
//            $table->string('token', 64)->unique(); // token column (varchar), unique
//            $table->text('abilities')->nullable(); // abilities column (text), nullable
//            $table->timestamp('last_used_at')->nullable(); // last_used_at column (timestamp), nullable
//            $table->timestamp('expires_at')->nullable(); // expires_at column (timestamp), nullable
//            $table->timestamps(); // created_at and updated_at columns
//
//            $table->unique('token'); // Adding unique index for token
//            $table->index(['tokenable_type', 'tokenable_id']); // Index for tokenable_type and tokenable_id
//        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
