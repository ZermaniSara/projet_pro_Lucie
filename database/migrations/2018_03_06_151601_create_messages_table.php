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
            $table->increments('id');
            $table->integer('user_id_e')->unsigned();
            $table->integer('user_id_r')->unsigned();
            $table->string('subject');
            $table->text('message');
            $table->foreign('user_id_e')->references('id')->on('users')->onDelete('cascade');
            
            $table->foreign('user_id_r')->references('id')->on('users')->onDelete('cascade');
            $table->engine = "InnoDB";
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('messages');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
     
    }
}
