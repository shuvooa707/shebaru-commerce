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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("image")->default("default_vendor_avatar.png");
            $table->text("address")->nullable();;
            $table->string("whatsapp")->nullable();;
            $table->string("facebook_link")->nullable();;
            $table->string("phone")->nullable();;
            $table->string("phone2")->nullable();
            $table->string("email")->nullable();;
            $table->string("email2")->nullable();

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
        Schema::dropIfExists('vendors');
    }
};
