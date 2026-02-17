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
        Schema::table('service_products', function (Blueprint $table) {
            $table->unsignedBigInteger('deposit_at_opening')->nullable()->change();
            $table->string('credit_access')->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_products', function (Blueprint $table) {
            $table->unsignedBigInteger('deposit_at_opening')->nullable(false)->change();
            $table->string('credit_access')->nullable(false)->change();
        });
    }

};
