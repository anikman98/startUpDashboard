<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagesManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('description', 500)->nullable();
            $table->string('company')->nullable();
            $table->string('project_name')->nullable();
            $table->string('progress');
            $table->string('comment');
            $table->string('status');  
            $table->date('stage_deadline'); 
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stages_managements');
    }
}
