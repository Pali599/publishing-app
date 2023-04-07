<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('reviewer_id')->nullable()->after('article_id');
            $table->string('result')->nullable()->after('reviewer_id');
            $table->text('comment')->nullable()->after('result');
            // Add a foreign key constraint if necessary
            $table->foreign('reviewer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Drop the foreign key constraint if necessary
            $table->dropForeign(['reviewer_id']);
            $table->dropColumn('reviewer_id');
            $table->dropColumn('result');
            $table->dropColumn('comment');
        });
    }
};
