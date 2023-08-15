<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsetting', function (Blueprint $table) {
            $table->id();
            $table->string('site_name',45);
            $table->string('phone',20);
            $table->string('email',20);
            $table->string('logo',45);
            $table->string('favicon',45);
            $table->string('footer',125);
            $table->string('address',125);
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
        Schema::dropIfExists('generalsetting');
    }
}
