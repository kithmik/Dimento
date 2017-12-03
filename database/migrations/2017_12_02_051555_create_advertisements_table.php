<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('object')->nullable();
            $table->string('texture')->nullable();
            $table->dateTime('deadline');
            $table->unsignedInteger('total_impressions')->default(0);
            $table->unsignedInteger('impressions')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('invoice_id')->nullable();
            $table->boolean('accepted')->default(0);
            $table->dateTime('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
