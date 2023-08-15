<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('tradeas', 45)->nullable();
            $table->string('address1', 125)->nullable();
            $table->string('plot', 45)->nullable();
            $table->string('block', 45)->nullable();
            $table->string('house', 45)->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('city', 45)->nullable();
            $table->string('phone_number', 16)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('tin_number', 10)->nullable();
            $table->string('tinCert')->nullable();
            $table->string('vrn', 125)->nullable();
            $table->string('vrnCert', 225)->nullable();
            $table->string('efin', 125)->nullable();
            $table->string('efin_password', 255)->nullable();
            $table->string('tax_region', 45)->nullable();
            $table->string('brelaORS', 155)->nullable();
            $table->string('CertofReg')->nullable();
            $table->string('CertExtr')->nullable();
            $table->string('CertIncorp')->nullable();
            $table->string('certVat')->nullable();
            $table->string('memart')->nullable();
            $table->string('CertRegDate', 155)->nullable();
            $table->string('tax_file_location')->nullable();
            $table->string('fiscal_yr', 15)->nullable();
            $table->string('company_type', 45)->nullable();
            $table->string('contactPerson_id', 45)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
