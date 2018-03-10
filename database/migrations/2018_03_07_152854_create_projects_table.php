<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('rate_id');
            $table->string('title')->nullable;
            $table->string('topic')->nullable();
            $table->string('pages');
            $table->string('cost');
            $table->string('description')->nullable;
            $table->string('file')->nullable();
            $table->string('video')->nullable();
            $table->string('status')->default('Unpublished');
            $table->string('dateline')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
