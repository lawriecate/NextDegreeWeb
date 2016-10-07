<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('is_incoming')->default(1);
            $table->string('email_from');
            $table->string('email_to');
            $table->string('email_subject');
            $table->string('email_body');
            $table->string('email_attachments_json')->nullable();
            $table->integer('resolved_at')->nullable()->default(null);
            $table->integer('resolved_by')->unique()->unsigned()->nullable()->default(null);
            $table->foreign('resolved_by')->references('id')->on('users');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('support_messages');
    }
}
