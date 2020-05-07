<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_topic', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary(['quiz_id', 'topic_id']);
            $table->integer('quiz_id')->unsigned()->index();
            $table->integer('topic_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->foreign('topic_id')->references('id')->on('topics');
            
            // $table->primary(['quiz_id', 'topic_id', 'user_id']);
        });
        
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_topic');
    }
}
