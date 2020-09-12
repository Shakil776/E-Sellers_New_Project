<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('kamiz_shoulder', 3, 1);
            $table->double('kamiz_neck', 3, 1);
            $table->double('kamiz_bust', 3, 1);
            $table->double('kamiz_waist', 3, 1);
            $table->double('kamiz_hips', 3, 1);
            $table->double('kamiz_length', 3, 1);
            $table->double('kamiz_sleeve_length', 3, 1);
            $table->double('kamiz_sleeve_around', 3, 1);
            $table->double('kamiz_armhole', 3, 1);
            $table->double('salwar_belt', 3, 1);
            $table->double('salwar_thigh', 3, 1);
            $table->double('salwar_calf', 3, 1);
            $table->double('salwar_ankle_hem', 3, 1);
            $table->double('salwar_length', 3, 1);
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
        Schema::dropIfExists('measurements');
    }
}
