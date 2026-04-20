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
        Schema::create('brvm_market_data', function (Blueprint $table) {
            $table->id();
            $table->decimal('index_value', 10, 2)->default(0);
            $table->decimal('change', 10, 2)->default(0);
            $table->decimal('change_percent', 8, 4)->default(0);
            $table->bigInteger('volume')->default(0);
            $table->integer('listed_companies')->default(45);
            $table->bigInteger('market_cap')->default(0);
            $table->boolean('is_fallback')->default(false); // savoir si la donnée est réelle ou fallback
            $table->timestamp('scraped_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brvm_market_data');
    }
};
