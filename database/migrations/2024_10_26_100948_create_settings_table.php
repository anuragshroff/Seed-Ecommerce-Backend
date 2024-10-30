<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('home_page_title')->nullable();
            $table->string('facebook_iframe')->nullable();
            $table->string('shop_address')->nullable();
         
            $table->string('facebook_pixel')->nullable();
            $table->string('tag_manager')->nullable();
            $table->string('google_analytics')->nullable();
            $table->string('domain_verification')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('stock_alert')->nullable();
            $table->integer('delivery_charge_inside')->nullable();
            $table->integer('delivery_charge_outside')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('store_email')->nullable();
            $table->string('site_meta_keyword')->nullable();
            $table->string('site_meta_description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('twitter')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
