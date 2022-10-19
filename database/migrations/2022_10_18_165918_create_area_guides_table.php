<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_guides', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('main_area_id')->nullable();
            $table->string('area_details')->nullable();
            $table->text('area_image')->nullable();
            $table->text('features_image')->nullable();
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
        Schema::dropIfExists('area_guides');
    }
}
