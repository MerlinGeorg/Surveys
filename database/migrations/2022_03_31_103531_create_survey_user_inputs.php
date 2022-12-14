<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyUserInputs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('survey_user_inputs')) {
            Schema::create('survey_user_inputs', function (Blueprint $table) {
                $table->id();
                $table->integer('surveyId')->nullable();
                $table->integer('userId')->nullable();
                $table->string('answer')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_user_inputs');
    }
}
