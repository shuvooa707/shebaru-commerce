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
        Schema::create('landing_page_sliders', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->unsignedBigInteger('landing_page_id');
            $table->string('image', 200)->nullable(); // image column (varchar 200, nullable)
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
