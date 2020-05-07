<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerMultiplechoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_multiplechoices', function (Blueprint $table) {            
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->integer('weight');
            $table->integer('is_answer');
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions')->cascade();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_multiplechoices');
    }
}
