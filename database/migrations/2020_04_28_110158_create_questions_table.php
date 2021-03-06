<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('embed_link')->nullable();
            $table->string('image')->nullable();
            $table->string('type');
            $table->integer('position')->unsigned()->default(1); // position to display
            $table->timestamps();
            $table->foreign('topic_id')->references('id')->on('topics')->cascade();
        });
        // change BLOB to MEDIUMBLOB
        // DB::statement("ALTER TABLE questions ALTER COLUMN image TYPE MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
