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
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('improve')->after('comment');
            $table->string('comment_author');
            $table->integer('originality');
            $table->integer('contribution');
            $table->integer('technical_quality');
            $table->integer('presentation_clarity');
            $table->integer('research_depth');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('improve');
            $table->dropColumn('comment_author');
            $table->dropColumn('originality');
            $table->dropColumn('contribution');
            $table->dropColumn('technical_quality');
            $table->dropColumn('presentation_clarity');
            $table->dropColumn('research_depth');
        });
    }
};
