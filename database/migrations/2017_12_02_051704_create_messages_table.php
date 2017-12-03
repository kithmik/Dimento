<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('recipient_id');
            $table->text('message');
            $table->string('image')->nullable();
            $table->string('object')->nullable();
            $table->string('texture')->nullable();
            $table->boolean('read')->default(0);
            $table->dateTime('r_deleted_at')->nullable();
            $table->dateTime('s_deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('sender_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('recipient_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
