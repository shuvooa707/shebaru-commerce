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
        Schema::create('home_section_images', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->string('title', 255)->nullable(); // title column (varchar 255, nullable)
            $table->text('text')->nullable(); // text column (text, nullable)
            $table->string('image', 255)->nullable(); // image column (varchar 255, nullable)
            $table->string('mobile_image', 255)->nullable(); // mobile_image column (varchar 255, nullable)
            $table->integer('section')->nullable(); // section column (integer, nullable)
            $table->string('link', 255)->nullable(); // link column (varchar 255, nullable)
            $table->integer('is_for_small')->nullable(); // is_for_small column (integer, nullable)
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }



    public function upOriginal()
    {
        Schema::create('home_section_images', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('home_section_images');
    }
};
