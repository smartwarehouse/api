<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialStatisticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_statistic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');
            $table->foreign('type')
                ->references('id')->on('type')
                ->onDelete('cascade');
            $table->unsignedInteger('user');
            $table->foreign('user')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('material');
            $table->foreign('material')
                ->references('id')->on('material')
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
        Schema::dropIfExists('material_statistic');
    }
}
