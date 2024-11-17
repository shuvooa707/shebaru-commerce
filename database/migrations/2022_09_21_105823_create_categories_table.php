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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->tinyInteger('type_id')->nullable(); // type_id column (nullable)
            $table->tinyInteger('parent_id')->nullable(); // parent_id column (nullable)
            $table->string('name', 255); // name column (required)
            $table->string('url', 100)->nullable(); // url column (nullable)
            $table->timestamps(); // created_at and updated_at timestamps
            $table->string('image', 255)->nullable(); // image column (nullable)
            $table->boolean('is_popular')->nullable(); // is_popular column (nullable)
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
