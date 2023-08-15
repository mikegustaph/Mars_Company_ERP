<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;

class monthlyjob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run monthly VAT service';

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
        $service = Service::all();
        foreach ($service as $s) {
            $s->run();
            }
        return 0;
    }
}
