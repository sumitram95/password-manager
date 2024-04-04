<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_password_manangers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('urls');
            $table->string('username');
            $table->string('password');
            $table->string('notes');
            $table->string('visibility');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('users_password_manangers');
    }
};
