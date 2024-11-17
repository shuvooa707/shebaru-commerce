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
//        Schema::create('role_has_permissions', function (Blueprint $table) {
//            $table->bigInteger('permission_id')->unsigned(); // permission_id column (bigint unsigned)
//            $table->bigInteger('role_id')->unsigned(); // role_id column (bigint unsigned)
//
//            // Primary key for the combination of permission_id and role_id
//            $table->primary(['permission_id', 'role_id']);
//
//            // Foreign key relationships
//            $table->foreign('permission_id')
//                ->references('id')
//                ->on('permissions')
//                ->onDelete('cascade'); // On delete cascade for permission_id
//
//            $table->foreign('role_id')
//                ->references('id')
//                ->on('roles')
//                ->onDelete('cascade'); // On delete cascade for role_id
//        });
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
