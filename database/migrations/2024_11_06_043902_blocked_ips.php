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
        Schema::create('blocked_ips', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint)
            $table->string('ip_address', 255)->nullable(); // IP address (nullable)
            $table->string('reason', 255)->nullable(); // reason for blocking (nullable)
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
