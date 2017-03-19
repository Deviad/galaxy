<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Schema::table('fields', function (Blueprint $table) {
//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
//        });

//        Schema::table('users', function (Blueprint $table) {
//
//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
//
//        });

//        Schema::table('events', function (Blueprint $table) {
//
//            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
//
//        });



        Schema::table('answers', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('set null')->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign('answers_event_id_foreign');
            $table->dropForeign('answers_user_id_foreign');
        });
//        Schema::table('events', function (Blueprint $table) {
//            $table->dropForeign('events_field_id_foreign');
//            $table->dropForeign('events_user_id_foreign');
//        });
//
//        Schema::table('users', function (Blueprint $table) {
//            $table->dropForeign('users_event_id_foreign');
//        });
//        Schema::table('fields', function (Blueprint $table) {
//            $table->dropForeign('fields_event_id_foreign');
//        });
    }
}
