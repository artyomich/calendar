<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559843070080TimeslotsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('timeslots')) {
            Schema::create('timeslots', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('servant_id');
                $table->foreign('servant_id', 'servant_fk_94081')->references('id')->on('users');
                $table->datetime('start_time');
                $table->datetime('end_time');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('timeslots');
    }
}
