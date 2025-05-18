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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stack_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('job_title');
            $table->timestamp('applied_date')->nullable();
            $table->string('vacancy');
            $table->string('education')->nullable();
            $table->string('salary')->nullable();
            $table->string('experience')->nullable();
            $table->longText('additional_requirement')->nullable();
            $table->longText('responsibilities')->nullable();
            $table->longText('benefits')->nullable();
            $table->string('employee_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
