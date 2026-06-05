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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('icon')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('icon_color')->nullable();
            $table->string('btn_color')->nullable();
            $table->string('level')->nullable();
            $table->string('badge')->nullable();
            $table->string('label')->nullable();
            $table->integer('question_count')->default(5);
            $table->integer('time_limit_minutes')->default(8);
            $table->boolean('is_dark')->default(false);
            $table->boolean('is_comprehensive')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
