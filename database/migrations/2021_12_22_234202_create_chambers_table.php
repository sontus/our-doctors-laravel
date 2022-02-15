<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambers', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('hospital_id');
            $table->string('consulting_hrs');
            $table->string('visitfees_one');
            $table->string('visitfees_two')->nullable();
            $table->string('mobile','20');
            $table->boolean('row_status')->default(true);
            $table->foreign('doctor_id')
                    ->references('id')->on('doctors')
                    ->onDelete('cascade');
            $table->foreign('hospital_id')
                    ->references('id')->on('hospitals')
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
        Schema::dropIfExists('chambers');
    }
}
