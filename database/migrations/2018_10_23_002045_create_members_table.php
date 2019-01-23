<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('fullname');
            $table->string('image')->default(env('USERS_STORAGE_PATH', '/storage/users/avatars/').'default.png');
            $table->string('commitee');
            $table->integer('commitee_id')->unsigned();
            $table->timestamps();

            $table->foreign('commitee_id')->references('id')
                                       ->on('commitees')
                                       ->onDelete('CASCADE')
                                       ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
