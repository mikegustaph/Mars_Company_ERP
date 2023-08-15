<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->nullable();
            $table->string('middle_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('tin', 15);
            $table->string('shareholder')->nullable();
            $table->enum('radio', ['resident', 'non-resident'])->nullable();
            $table->string('passport', 45)->nullable();
            $table->string('passportcopy', 65)->nullable();
            $table->string('nida', 45)->nullable();
            $table->string('nidacopy', 65)->nullable();
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
        Schema::dropIfExists('contact_people');
    }
}
