<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('description')->nullable();
            $table->string('icon', 50)->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_premium')->default(false);
            $table->boolean('ads_enabled')->default(true);
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
