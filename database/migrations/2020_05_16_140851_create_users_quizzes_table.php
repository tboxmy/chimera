<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_quizzes', function (Blueprint $table) {
            $table->primary(['user_id', 'quiz_id', 'question_id']);
            $table->integer('user_id')->unsigned()->index();
            $table->integer('quiz_id')->unsigned()->index();
            $table->integer('question_id')->unsigned()->index();
            $table->integer('result');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::dropIfExists('users_quizzes')->cascade();
    }
}
