<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('surveys')) {
            Schema::create('surveys', function (Blueprint $table) {
                $table->id();
                $table->string('question')->nullable();
                $table->timestamps();
            });
        }
        DB::table('surveys')->insert([
            ['question' => 'Do you prefer coffee over tea?'],
            ['question' => 'Do you prefer Tv over phone?'],
            ['question' => 'Do you watch films?'],
            ['question' => 'Do you read books?'],
            ['question' => 'Do you know science?'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
