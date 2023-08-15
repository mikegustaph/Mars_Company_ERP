<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePrechecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_prechecks', function (Blueprint $table) {
            $table->id();
            $table->string('name',45)->nullable();
            $table->string('note',255)->nullable();
            $table->enum('multiple_upload',['Yes','No'])->default('Yes');
            $table->enum('mandatory',['Yes','No'])->default('Yes');
            $table->string('description',255)->nullable();
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
        Schema::dropIfExists('service_prechecks');
    }
}
