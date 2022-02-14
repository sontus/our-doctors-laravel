<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('division_id');
            $table->unsignedTinyInteger('district_id');
            $table->unsignedTinyInteger('division_id');
            $table->text('map_location');
            $table->string('address');
            $table->boolean('row_status')->default(true);
            $table->string('logo')->nullable();
            $table->foreign('division_id')
                    ->references('id')->on('divisions')
                    ->onDelete('cascade');
            $table->foreign('district_id')
                    ->references('id')->on('districts')
                    ->onDelete('cascade');
            $table->foreign('upazila_id')
                    ->references('id')->on('upazilas')
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
        Schema::dropIfExists('hospitals');
    }
}
