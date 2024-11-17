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
        Schema::create('informations', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (int)
            $table->string('site_name'); // site_name column (varchar 255)
            $table->string('site_logo'); // site_logo column (varchar 255)
            $table->string('owner_phone'); // owner_phone column (varchar 255)
            $table->string('owner_email'); // owner_email column (varchar 255)
            $table->string('address'); // address column (varchar 255)
            $table->text('tracking_code')->nullable(); // tracking_code column (text, nullable)
            $table->string('copyright'); // copyright column (varchar 255)
            $table->string('facebook'); // facebook column (varchar 255)
            $table->string('instagram'); // instagram column (varchar 255)
            $table->string('youtube'); // youtube column (varchar 255)
            $table->integer('recommend_num')->nullable(); // recommend_num column (int, nullable)
            $table->integer('discount_num')->nullable(); // discount_num column (int, nullable)
            $table->integer('newarrival_num')->nullable(); // newarrival_num column (int, nullable)
            $table->tinyInteger('bkash')->nullable(); // bkash column (tinyint, nullable)
            $table->string('bkash_number', 100)->nullable(); // bkash_number column (varchar 100, nullable)
            $table->tinyInteger('nogod')->nullable(); // nogod column (tinyint, nullable)
            $table->string('nogod_number', 100); // nogod_number column (varchar 100)
            $table->tinyInteger('rocket')->nullable(); // rocket column (tinyint, nullable)
            $table->string('rocket_number', 100)->nullable(); // rocket_number column (varchar 100, nullable)
            $table->tinyInteger('paypal')->nullable(); // paypal column (tinyint, nullable)
            $table->string('paypal_account', 100)->nullable(); // paypal_account column (varchar 100, nullable)
            $table->tinyInteger('stripe')->nullable(); // stripe column (tinyint, nullable)
            $table->string('stripe_account', 100)->nullable(); // stripe_account column (varchar 100, nullable)
            $table->string('supp_num1', 20)->nullable(); // supp_num1 column (varchar 20, nullable)
            $table->string('supp_num2', 20)->nullable(); // supp_num2 column (varchar 20, nullable)
            $table->string('supp_num3', 20)->nullable(); // supp_num3 column (varchar 20, nullable)
            $table->integer('number_visibility')->nullable(); // number_visibility column (int, nullable)
            $table->tinyInteger('coupon_visibility')->nullable(); // coupon_visibility column (tinyint, nullable)
            $table->string('currency', 50)->nullable(); // currency column (varchar 50, nullable)
            $table->string('redx_api_base_url')->nullable(); // redx_api_base_url column (varchar 255, nullable)
            $table->string('redx_api_access_token', 1000)->nullable(); // redx_api_access_token column (varchar 1000, nullable)
            $table->string('pathao_api_base_url')->nullable(); // pathao_api_base_url column (varchar 255, nullable)
            $table->string('pathao_api_access_token', 1500)->nullable(); // pathao_api_access_token column (varchar 1500, nullable)
            $table->integer('pathao_store_id')->nullable(); // pathao_store_id column (int, nullable)
            $table->string('steadfast_api_base_url')->nullable(); // steadfast_api_base_url column (varchar 255, nullable)
            $table->string('steadfast_api_key')->nullable(); // steadfast_api_key column (varchar 255, nullable)
            $table->string('steadfast_secret_key')->nullable(); // steadfast_secret_key column (varchar 255, nullable)
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
