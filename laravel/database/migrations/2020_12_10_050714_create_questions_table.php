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
            $table->id();
            $table->timestamps();
            $table->string('title', 50);
            $table->text('content');
            $table->text('opening_comment');
            $table->string('interviewee_name');
            $table->text('interviewer_comment');
            $table->text('questioner_comment');
            $table->string('user_id');
            $table->string('interviewer_id');
            $table->string('article_id');
        });
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
