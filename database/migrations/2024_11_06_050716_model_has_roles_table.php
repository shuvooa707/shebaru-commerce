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
//        Schema::create('model_has_roles', function (Blueprint $table) {
//            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); // Foreign key to roles table
//            $table->string('model_type'); // model_type column (varchar 255)
//            $table->unsignedBigInteger('model_id'); // model_id column (bigint unsigned)
//            $table->primary(['role_id', 'model_id', 'model_type']); // Composite primary key
//            $table->index(['model_id', 'model_type'], 'model_has_roles_model_id_model_type_index'); // Index on model_id and model_type
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
