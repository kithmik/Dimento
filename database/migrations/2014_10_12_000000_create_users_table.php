<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_pic')->nullable();

            $table->string('phone', 15)->nullable();
            $table->boolean('phone_privacy')->default(0);

            $table->date('dob')->nullable();
            $table->unsignedInteger('type')->default(1);

            $table->integer('rating')->nullable();
            $table->unsignedInteger('level')->default(0);

//            $table->boolean('mobile')->default(0);


            $table->boolean('admin')->default(0);
            $table->string('confirmation_code')->nullable();

            $table->string('email')->unique();
            $table->boolean('email_privacy')->default(0);

            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Dimento',
            'type' => '4',
            'admin' => 1,
            'email' => 'dimentoapp@gmail.com',
            'password' => bcrypt('dimento@123'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
