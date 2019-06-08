<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeslotsTable extends Migration
{
    public function up()
    {
       Schema::table('timeslots', function (Blueprint $table) {
            $table->boolean('active')->default(0)->nullable();

        });
    }
}
