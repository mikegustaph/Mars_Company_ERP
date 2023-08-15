<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecieveDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recieve_docs', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('service_id');
            $table->string('task_id');
            $table->string('dateReceived');
            $table->string('note');
            $table->string('quantity');
            $table->enum('fileType',['file','folder','box'])->default('file');
            $table->string('narration');
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
        Schema::dropIfExists('recieve_docs');
    }
}
