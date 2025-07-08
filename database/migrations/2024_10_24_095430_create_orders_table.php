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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->unique();
            $table->date('date');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_status', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->enum('status', ['Pending', 'Processing', 'Delivered', 'Cancelled', 'Pending Delivery', 'Returned', 'Confirmed', 'Pick Up', 'On The Way'])->default('Pending');
            $table->string('name')->null();
            $table->string('address')->null();
            $table->string('mobile')->null();
            $table->string('area')->null();

            $table->string('consignment_id')->null();
            $table->string('tracking_code')->null();
            $table->string('couriar_status')->null();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
