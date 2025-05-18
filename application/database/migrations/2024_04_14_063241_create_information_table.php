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
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('photo')->nullable();
            $table->integer('age');
            $table->string('nationality');
            $table->longText('address');
            $table->string('phone');
            $table->string('email');
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->tinyInteger('is_freelancer')->nullable()->default(0)->comment('0 = unavailable, 1 = available');
            $table->json('languages')->nullable();
            $table->integer('project')->nullable();
            $table->integer('customer')->nullable();
            $table->string('color_code')->nullable();
            $table->longText('description');
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informations');
    }
};
