<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('division_id');
            $table->string('name', 100);
            $table->string('bn_name', 200);
            $table->string('lat', 20)->nullable();
            $table->string('lon', 20)->nullable();
            $table->string('url', 150)->nullable();
            $table->timestamps();
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
