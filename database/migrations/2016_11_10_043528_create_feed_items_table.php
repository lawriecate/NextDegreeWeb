<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('feed_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('image_json');
            $table->string('link');
            $table->string('filter_profile');
            $table->string('filter_account_age');
            $table->string('filter_login_time');
            $table->string('filter_institution_id');
            $table->string('filter_location');
            $table->string('filter_student_degree');
            $table->string('filter_student_skills');

            // FILTERS/
            // business / student profile
            // account age
            // time since login
            // university
            // location
            // degree
            // 
            $table->datetime('publish_at');
            $table->string('source');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('feed_items');
    }
}
