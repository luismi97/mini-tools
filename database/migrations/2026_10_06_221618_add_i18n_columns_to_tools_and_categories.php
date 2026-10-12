<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Base columns hold the default locale (English). `translations` holds every
     * other locale as {"es": {"name": "...", "slug": "...", ...}}, so adding a
     * language never needs a migration.
     */
    public function up(): void
    {
        Schema::table('tools', function (Blueprint $table) {
            $table->json('steps')->nullable()->after('content');
            $table->json('faq')->nullable()->after('steps');
            $table->json('translations')->nullable()->after('faq');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('intro');
        });
    }

    public function down(): void
    {
        Schema::table('tools', fn (Blueprint $table) => $table->dropColumn(['steps', 'faq', 'translations']));
        Schema::table('categories', fn (Blueprint $table) => $table->dropColumn('translations'));
    }
};
