<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1559843700823AppointmentsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('appointments')) {
            Schema::create('appointments', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('citizen_id');
                $table->foreign('citizen_id', 'citizen_fk_94096')->references('id')->on('users');
                $table->datetime('start_time');
                $table->datetime('end_time');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
