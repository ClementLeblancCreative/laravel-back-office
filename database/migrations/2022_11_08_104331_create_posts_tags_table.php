<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tags_id')->constrained()->cascadeOnDelete();
            $table->foreignId('posts_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts_tags', function (Blueprint $table) {
            $table->dropForeign('posts_tags_posts_id_foreign');
            $table->dropForeign('posts_tags_tags_id_foreign');
        });
        Schema::dropIfExists('posts_tags');
    }
};
