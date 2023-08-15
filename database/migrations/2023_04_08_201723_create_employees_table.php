<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('task_id');
            $table->string('first_name', 25)->nullable();
            $table->string('middle_name', 25)->nullable();
            $table->string('last_name', 25)->nullable();
            $table->enum('status', ['Active', 'Retired', 'Supended'])->default('Active');
            $table->string('images', 65)->nullable();
            $table->string('position', 45)->nullable();
            $table->string('cv', 65)->nullable();
            $table->string('contract', 65)->nullable();
            $table->string('application', 45)->nullable();
            $table->string('offer_letter', 45)->nullable();
            $table->string('nssf')->nullable();
            $table->string('termination', 45)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('email', 25)->nullable();
            $table->string('joining_date')->nullable();
            $table->string('contract_period')->nullable();
            $table->string('tin', 45)->nullable();
            $table->string('nida', 45)->nullable();
            $table->string('username', 45)->nullable();
            $table->string('password', 45)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
