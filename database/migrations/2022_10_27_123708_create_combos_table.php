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
        Schema::create('combos', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->mediumInteger('product_id'); // product_id column (mediumint)
            $table->string('type', 255)->nullable(); // type column (varchar 255, nullable)
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }


    public function upOriginal()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('product_id');
            $table->string('type')->nullable();
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
        Schema::dropIfExists('combos');
    }
};
