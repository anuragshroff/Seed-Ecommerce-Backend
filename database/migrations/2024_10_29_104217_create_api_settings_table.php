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
        Schema::create('api_settings', function (Blueprint $table) {
            $table->id();

            $table->string('pathau_client_id')->nullable();
            $table->string('pathau_client_secret')->nullable();
            $table->string('pathau_username')->nullable();
            $table->string('pathau_password')->nullable();

            $table->string('steadfast_client_id')->nullable();
            $table->string('steadfast_client_secret')->nullable();

            $table->string('redx_client_id')->nullable();
            $table->string('redx_client_secret')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_settings');
    }
};
