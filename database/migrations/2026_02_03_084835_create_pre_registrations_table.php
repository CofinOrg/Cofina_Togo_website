<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pre_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('service_products')->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_adress');
            $table->string('customer_email');
            $table->string('identity_document')->nullable();
            $table->string('identity_photo')->nullable();
            $table->string('proof_of_address')->nullable();
            $table->string('card_cfe')->nullable();
            $table->string('receipt_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_registrations');
    }
};
