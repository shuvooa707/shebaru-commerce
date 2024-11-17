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
        Schema::create('colors', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->string('name', 255)->nullable(); // name column (nullable)
            $table->string('code', 255)->nullable(); // code column (nullable)
            $table->integer('is_default')->nullable(); // is_default column (nullable)
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }


    public function upOriginal()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('colors');
    }
};
