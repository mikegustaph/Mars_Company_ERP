<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dispatchjob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('dispatchjob', function(Blueprint $table){
            $table->id();
            $table->string('clients_id',65);
            $table->string('dispatch_date',65);
            $table->string('checkout',65);
            $table->string('narration',65);
            $table->string('custom_desc',65);
            $table->string('custom_check',65);
            $table->string('custom_narration',65);
            $table->string('dispatch_note',65);
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
        Schema::dropIfExists('dispatchjob');
    }
}
