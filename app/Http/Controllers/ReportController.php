<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function dailyreport()
    {
        return view('reports.daily');
    }
    public function weeklyreport()
    {
        return view('reports.weekly');
    }
    public function monthlyreport()
    {
        return view('reports.month');
    }
    public function yearlyreport()
    {
        return view('reports.yearly');
    }
    public function documentReceived()
    {
        return view('reports.document-received');
    }
}
