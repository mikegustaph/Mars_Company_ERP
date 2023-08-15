<?php

namespace App\Http\Controllers;


use App\Models\Reminders;
use App\Http\Controllers\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RemindersController extends Controller
{
    public function reminder()
    {
        $reminders = Reminders::all();
        $now = Carbon::now();
        $dateNow = $now->format('Y-m-d');
        $timeNow = $now->format('H:i:s');
        return view('reminder.reminder', compact('reminders', 'dateNow', 'timeNow'));
    }

    public function createReminder(Request $request)
    {
        $reminder = new Reminders();
        $reminder->name          =   $request->input('name');
        $reminder->description   =   $request->input('description');
        $reminder->date          =   $request->input('date');
        $reminder->time          =   $request->input('time');
        $reminder->frequency     =   $request->input('frequency');

        $reminder->save();
        $reminders = Reminders::all();
        return view('reminder.reminder', compact('reminders'));
    }
    public function calendar()
    {
        return view('reminder.calendar');
    }

    public function updateview($id)
    {
        $reminderId = Reminders::find($id);
        return view('reminder.reminder', compact('reminderId'));
    }

    public function update(Request $request)
    {
        $reminderUpdate =  new Reminders();

        $reminderUpdate->name          =   $request->reminder_name;
        $reminderUpdate->description   =   $request->description;
        $reminderUpdate->date          =   $request->reminder_date;
        $reminderUpdate->time          =   $request->reminder_time;
        $reminderUpdate->frequency     =   $request->frequency;
    }
}
