<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_profiles',function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_path');
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->string('area');
            $table->string('introduction');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_profiles');
    }
}
