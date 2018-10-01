<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->increments('id');
            $table->string('material_code');
            $table->string('name');
            $table->integer('qty');
            $table->string('image');
            $table->unsignedInteger('rfid');
            $table->foreign('rfid')
                ->references('id')->on('rfid')
                ->onDelete('cascade');
            $table->unsignedInteger('location');
            $table->foreign('location')
                ->references('id')->on('location')
                ->onDelete('cascade');
            $table->unsignedInteger('material_category');
            $table->foreign('material_category')
                ->references('id')->on('material_category')
                ->onDelete('cascade');
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
        Schema::dropIfExists('material');
    }
}
