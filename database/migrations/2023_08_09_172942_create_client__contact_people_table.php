<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client__contact_people', function (Blueprint $table) {
            $table->id();
            $table->string('client_id', 45);
            $table->string('contact_people_id', 45);
            $table->string('director', 45);
            $table->string('shareholder', 45);
            $table->string('shareholding', 100);
            $table->string('share_percent', 100);
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
        Schema::dropIfExists('client__contact_people');
    }
}
