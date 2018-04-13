<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContentsCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('文章名称');
            $table->integer('cat_id')->unsigned()->default(0)->comment('分类名 单页面统一为-1');
            $table->text('detail')->nullable()->comment('内容');
            $table->smallInteger('show_on_side')->default(0)->comment('显示在后台边栏');
            $table->smallInteger('show_on_nav')->default(0)->comment('显示在首页导航');
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
        Schema::dropIfExists('contents');
    }
}
