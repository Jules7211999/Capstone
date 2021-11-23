<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishCatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_catches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('barangay_id')->constrained('barangs')->onDelete('cascade');
            $table->unsignedBigInteger('kilos');
            $table->foreignId('fish_id')->constrained('fish')->onDelete('cascade');
            $table->foreignId('month_id')->constrained('months')->onDelete('cascade');
            $table->string('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fish_catches');
    }
}
