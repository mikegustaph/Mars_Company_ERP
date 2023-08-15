<?php

namespace App\Console\Commands;

use App\Models\Reminders;
use Illuminate\Console\Command;

class UpdateReminderDateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:update-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $dailyReminders = Reminders::where('frequency', 'daily')->get();
        $weeklyReminders = Reminders::where('frequency', 'weekly')->get();
        $monthlyReminders = Reminders::where('frequency', 'monthly')->get();

        $dailyReminders->each(function ($reminder) {
            $now = now();
            $dateNow = $now->format('Y-m-d');
            $reminder->update(['date' => $dateNow]);
        });

        $weeklyReminders->each(function ($reminder) {
            $now = now();
            $dateNow = $now->format('Y-m-d');
            $reminder->update(['date' => $dateNow]);
        });

        $monthlyReminders->each(function ($reminder) {
            $now = now();
            $dateNow = $now->format('Y-m-d');
            $reminder->update(['date' => $dateNow]);
        });

        // Output a message indicating the update is complete
        //$this->info('Reminder dates have been updated.');
    }
}
