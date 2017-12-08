<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_views', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('object_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->boolean('opened')->default(0);
            $table->timestamps();

            $table->index(['object_id', 'user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_views');
    }
}
