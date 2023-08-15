<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePwdportalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwdportal', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('tra_portal_name')->nullable();
            $table->string('tra_portal_tin')->nullable();
            $table->string('tax_portal_passwrd')->nullable();
            $table->string('tax_portal_tin')->nullable();
            $table->string('payment_passwrd')->nullable();
            $table->string('brela_name')->nullable();
            $table->string('brela_userid')->nullable();
            $table->string('brela_passwrd')->nullable();
            $table->string('nssf_userid')->nullable();
            $table->string('nssf_passwrd')->nullable();
            $table->string('efin_userid')->nullable();
            $table->string('efin_passwrd')->nullable();
            $table->string('wcf_name')->nullable();
            $table->string('wcf_userid')->nullable();
            $table->string('wcf_passwrd')->nullable();
            $table->string('wcf_ic_name')->nullable();
            $table->string('wcf_ic_userid')->nullable();
            $table->string('wcf_ic_passwrd')->nullable();
            $table->string('bo_name')->nullable();
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
        Schema::dropIfExists('pwdportal');
    }
}
