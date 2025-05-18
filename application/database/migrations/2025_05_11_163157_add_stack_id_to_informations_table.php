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
        Schema::table('informations', function (Blueprint $table) {
            $table->foreignId('stake_id')->nullable()->after('user_id')->constrained('stakes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->dropForeign(['stake_id']); // Correct: uses array
            $table->dropColumn('stake_id');    // Optional: remove column too
        });
    }
};
