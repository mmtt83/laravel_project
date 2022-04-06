<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\CategoryType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->enum('category', CategoryType::getValues())
                //->default(CategoryType::LEARNING);
            $table->foreignId('category_id')->consrained('categories')->onDelete('cascade'); //外部キーcategory_idを作ります。参照先はcategoriesテーブルです。カテゴリーを削除した場合は、それに紐づくIDも削除されます。3つ目入らないことが多いけど入れるのがマナー。
            $table->string('post_title');
            $table->text('post_body');
            $table->integer('select_time');
            $table->string('cover_img');
            $table->integer('user_id');
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
        Schema::dropIfExists('posts');
    }
};
