<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('institution_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('course_skill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_id')->unsigned();
            $table->integer('course_id')->unsigned();
        });

         Schema::table('students', function (Blueprint $table) {
           
            $table->integer('course_id')->unsigned()->nullable()->default(null);
            $table->foreign('course_id')->references('id')->on('courses');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('students', function (Blueprint $table) {
           
            $table->dropColumn('course_id');
            $table->dropColumn('course_id');
          
        });
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_skill');


    }
}
