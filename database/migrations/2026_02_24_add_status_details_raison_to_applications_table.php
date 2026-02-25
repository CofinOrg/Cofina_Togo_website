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
        Schema::table('applications', function (Blueprint $table) {
            if (!Schema::hasColumn('applications', 'status')) {
                $table->enum('status', ['pending', 'rejected', 'accepted'])->default('pending');
            }
            if (!Schema::hasColumn('applications', 'details')) {
                $table->json('details')->nullable();
            }
            if (!Schema::hasColumn('applications', 'raison')) {
                $table->text('raison')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if (Schema::hasColumn('applications', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('applications', 'details')) {
                $table->dropColumn('details');
            }
            if (Schema::hasColumn('applications', 'raison')) {
                $table->dropColumn('raison');
            }
        });
    }
};
