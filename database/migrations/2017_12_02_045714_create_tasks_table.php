<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->dateTime('deadline');
            $table->decimal('amount', 10, 2)->nullable();
            $table->boolean('hourly')->default(0)->nullable();
            $table->boolean('fixed_price')->default(1);
            $table->integer('type')->default(1);
            $table->unsignedBigInteger('freelancer_id')->nullable();
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->boolean('published')->default(0);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('freelancer_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('invoice_id')
                ->references('id')->on('invoices')
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
        Schema::dropIfExists('tasks');
    }
}
