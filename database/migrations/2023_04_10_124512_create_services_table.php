<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name',45)->nullable();
            $table->string('description',45)->nullable();
            $table->string('duedate')->nullable();
            $table->enum('repeat',['none','daily','weekly','monthly','yearly'])->default('none');
            $table->enum('service_kpi',['Yes','No'])->nullable();
            $table->integer('kpi_receive_target_day')->nullable();
            $table->integer('kpi_receive_early_points')->nullable();
            $table->integer('kpi_receive_late_points')->nullable();
            $table->integer('kpi_complete_target_day')->nullable();
            $table->integer('kpi_complete_early_points')->nullable();
            $table->integer('kpi_complete_late_points')->nullable();
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
        Schema::dropIfExists('services');
    }
}
