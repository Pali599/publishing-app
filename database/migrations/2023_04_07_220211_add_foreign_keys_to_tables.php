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
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->change();
            $table->unsignedBigInteger('created_by')->change();
            $table->unsignedBigInteger('reviewer_int')->nullable()->change();
            $table->unsignedBigInteger('reviewer_ext')->nullable()->change();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('reviewer_int')->references('id')->on('users');
            $table->foreign('reviewer_ext')->references('id')->on('users');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->change();

            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_category_id_foreign');
            $table->dropForeign('articles_created_by_foreign');
            $table->dropForeign('articles_reviewer_int_foreign');
            $table->dropForeign('articles_reviewer_ext_foreign');

            $table->integer('category_id')->change();
            $table->integer('created_by')->change();
            $table->integer('reviewer_int')->nullable()->change();
            $table->integer('reviewer_ext')->nullable()->change();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign('reviews_article_id_foreign');

            $table->integer('article_id')->change();
        });
    }
};
