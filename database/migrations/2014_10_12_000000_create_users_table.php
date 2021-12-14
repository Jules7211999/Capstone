<?php

use App\Models\Coordinates;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('role');
            $table->string('profile_image')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('barangay_id')->nullable()->constrained('barangs');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('username')->nullable();
            $table->softDeletes();
            $table->string('marital_status')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

    
}
