<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpazilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upazilas', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('district_id');
            $table->string('name', 100);
            $table->string('bn_name', 200);
            $table->string('url', 150)->nullable();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('upazilas');
    }
}
