<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Long-form, indexable copy (trusted HTML written by the site owner).
        Schema::table('tools', function (Blueprint $table) {
            $table->longText('content')->nullable()->after('description');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->text('intro')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('tools', fn (Blueprint $table) => $table->dropColumn('content'));
        Schema::table('categories', fn (Blueprint $table) => $table->dropColumn('intro'));
    }
};
