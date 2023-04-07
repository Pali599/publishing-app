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
            $table->dropColumn('reviewer_int');
            $table->dropColumn('reviewer_ext');
            $table->dropColumn('result_int');
            $table->dropColumn('result_ext');
            $table->dropColumn('comment_int');
            $table->dropColumn('comment_ext');
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('reviewer_int')->nullable();
            $table->integer('reviewer_ext')->nullable();
            $table->string('result_int')->nullable();
            $table->string('result_ext')->nullable();
            $table->string('comment_int')->nullable();
            $table->string('comment_ext')->nullable();
        });
    }
};
