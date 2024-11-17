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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key (bigint unsigned)
            $table->string('cover_image', 255)->nullable(); // cover image (nullable)
            $table->string('page_title', 255); // page title (not nullable)
            $table->string('sub_title', 255); // subtitle (not nullable)
            $table->string('speech', 255); // speech (not nullable)
            $table->string('signature', 255)->nullable(); // signature (nullable)
            $table->string('page_desc', 255); // page description (not nullable)
            $table->string('slider_img_one', 255)->nullable(); // slider image 1 (nullable)
            $table->string('slider_img_two', 255)->nullable(); // slider image 2 (nullable)
            $table->string('slider_img_three', 255)->nullable(); // slider image 3 (nullable)
            $table->string('slider_caption_one', 255); // slider caption 1 (not nullable)
            $table->string('slider_caption_two', 255); // slider caption 2 (not nullable)
            $table->string('slider_caption_three', 255); // slider caption 3 (not nullable)
            $table->string('title_one', 255); // title 1 (not nullable)
            $table->string('title_two', 255); // title 2 (not nullable)
            $table->string('desc_one', 255); // description 1 (not nullable)
            $table->string('desc_two', 255); // description 2 (not nullable)
            $table->string('video', 255)->nullable(); // video (nullable)
            $table->string('site_name', 255)->nullable(); // site name (nullable)
            $table->string('site_url', 255)->nullable(); // site URL (nullable)
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }



    public function upOriginal()
    {
        if (!Schema::hasTable('about_us')) {
            Schema::create('about_us', function (Blueprint $table) {
                $table->id();
                $table->string('cover_image')->nullable();
                $table->string('page_title');
                $table->string('sub_title');
                $table->string('speech');
                $table->string('signature')->nullable();
                $table->string('page_desc');
                $table->string('slider_img_one')->nullable();
                $table->string('slider_img_two')->nullable();
                $table->string('slider_img_three')->nullable();
                $table->string('slider_caption_one');
                $table->string('slider_caption_two');
                $table->string('slider_caption_three');
                $table->string('title_one');
                $table->string('title_two');
                $table->string('desc_one');
                $table->string('desc_two');
                $table->string('video')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
};
