<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->double('torque');
            $table->double('power');
            $table->integer('shifting_rpm');
            $table->integer('limit_rpm');
            $table->double('weight');
            $table->double('mass');
            $table->double('wheel_rad');
            $table->double('primary_gear_ratio');
            $table->double('gear_ratio_1');
            $table->double('gear_ratio_2');
            $table->double('gear_ratio_3');
            $table->double('gear_ratio_4');
            $table->double('gear_ratio_5');
            $table->double('gear_ratio_6');
            $table->double('secondary_gear_ratio');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
