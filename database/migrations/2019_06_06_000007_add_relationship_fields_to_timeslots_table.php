<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeslotsTable extends Migration
{
    public function up()
    {
        Schema::table('timeslots', function (Blueprint $table) {
            $table->unsignedInteger('servant_id');
            $table->foreign('servant_id', 'servant_fk_94081')->references('id')->on('users');
        });
    }
}
