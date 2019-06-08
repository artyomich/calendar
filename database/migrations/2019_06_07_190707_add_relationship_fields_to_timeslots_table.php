<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeslotsTable extends Migration
{
    public function up()
    {
        Schema::table('timeslots', function (Blueprint $table) {
            $table->unsignedInteger('specialization_id');
            $table->foreign('specialization_id', 'specialization_fk_23576')->references('id')->on('specializations');
        });
    }
}
