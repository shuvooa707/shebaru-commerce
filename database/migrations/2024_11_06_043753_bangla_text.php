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
        Schema::create('bangla_text', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (int unsigned)
            $table->string('order_text', 100)->nullable(); // order text (nullable)
            $table->string('cart_text', 100)->nullable(); // cart text (nullable)
            $table->string('checkout_form_top_text', 100)->nullable(); // checkout form top text (nullable)
            $table->string('name_text', 100)->nullable(); // name text (nullable)
            $table->string('mobile_text', 100)->nullable(); // mobile text (nullable)
            $table->string('address_text', 100)->nullable(); // address text (nullable)
            $table->string('order_confirm_text', 100)->nullable(); // order confirm text (nullable)
            $table->string('delivery_text', 100)->nullable(); // delivery text (nullable)
            $table->string('select_text', 100)->nullable(); // select text (nullable)
            $table->string('fshipping_text', 100)->nullable(); // fshipping text (nullable)

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
