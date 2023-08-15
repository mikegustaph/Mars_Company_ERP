<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\Service;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TaskService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'services:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create and assign new services to employees';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $vatdueData = Carbon::now()->startOfMonth()->addDays(19);
        $vatdueData = $vatdueData->toDateString();
        $payrolldueDate = Carbon::now()->startOfMonth()->addDays(6);
        $payrolldueDate = $payrolldueDate->toDateString();

        $serviceToDo = Service::create(['service' => 'VAT']);

        $activeEmployee = Employee::has('status', '=', 'Active');

        foreach($activeEmployee as $e){
            Tasks::create([
            'employee_id' => $e->id,
            'service_id' => $serviceToDo->id,
            'due_date' => $vatdueData,
        ]);
        }




    }
}
