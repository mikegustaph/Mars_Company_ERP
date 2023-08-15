<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_services', function (Blueprint $table) {
            $table->id();
            $table->string('services_id');
            $table->string('clients_id');
            $table->string('service_repeat',45)->nullable();
            $table->date('schedule_start')->nullable();
            $table->date('schedule_end')->nullable();
            $table->date('schedule_next')->nullable();
            $table->enum('status',['Activate','Deactivate'])->default('Activate');
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
        Schema::dropIfExists('client_services');
    }
}
