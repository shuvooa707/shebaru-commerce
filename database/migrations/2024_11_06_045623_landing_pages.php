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
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // foreign key to products table
            $table->string('title1', 255)->nullable(); // title1 column (varchar 255, nullable)
            $table->text('title2')->nullable(); // title2 column (text, nullable)
            $table->text('video_url')->nullable(); // video_url column (text, nullable)
            $table->text('des1')->nullable(); // des1 column (text, nullable)
            $table->string('feature', 255)->nullable(); // feature column (varchar 255, nullable)
            $table->string('image', 255)->nullable(); // image column (varchar 255, nullable)
            $table->string('old_price', 200)->nullable(); // old_price column (varchar 200, nullable)
            $table->string('new_price', 200)->nullable(); // new_price column (varchar 200, nullable)
            $table->string('phone', 100)->nullable(); // phone column (varchar 100, nullable)
            $table->text('des3')->nullable(); // des3 column (text, nullable)
            $table->string('pay_text', 255)->nullable(); // pay_text column (varchar 255, nullable)
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
