<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id',11);
            $table->string('services_id',11);
            $table->string('clients_id',11);
            $table->date('start_date')->nullable();
            $table->string('job_date_documents_received_precheck',255)->nullable();
            $table->enum('job_kpi_enabled', ['Yes','No'])->default('Yes');
            $table->date('job_kpi_deadline_to_receive_document')->nullable();
            $table->date('job_date_documents_receive')->nullable();
            $table->integer('job_kpi_points_to_receive_documents')->nullable();
            $table->integer('job_kpi_deadline_to_complete')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('job_kpi_points_to_complete_job')->nullable();
            $table->enum('job_status',['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('tasks');
    }
}
