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
            $table->integer('user_id')->unsigned();
            $table->integer('commitee_id')->unsigned();
            $table->timestamps();

            $table->primary('user_id');
            $table->foreign('commitee_id')->references('id')
                                       ->on('commitees')
                                       ->onDelete('CASCADE')
                                       ->onUpdate('CASCADE');

            $table->foreign('user_id')->references('id')
                                       ->on('users')
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
