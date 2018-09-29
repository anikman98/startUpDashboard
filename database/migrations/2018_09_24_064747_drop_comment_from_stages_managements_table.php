<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCommentFromStagesManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages_managements', function (Blueprint $table) {
            $table->dropColumn('comment');
            $table->dropColumn('progress');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stages_managements', function (Blueprint $table) {
            $table->dropColumn('comment');
            $table->dropColumn('progress');
        });
    }
}
