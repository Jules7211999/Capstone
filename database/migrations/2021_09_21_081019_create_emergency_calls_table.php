<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_calls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('latitude');
            $table->string('longitude');
            $table->dateTimeTz('datetimezone');
            $table->string('month_name');
            $table->string('day_of_week');
            $table->string('status');
            $table->softDeletes();
            $table->string('type');
            $table->dateTimeTz('dtz_accepted')->nullable();
            $table->dateTimeTz('dtz_finished')->nullable();
            $table->string('hello');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_calls');
    }
}
