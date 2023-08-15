<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Tasks;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalTask      = Tasks::count();
        $totalClients   = Client::count();
        return view('home', compact(['totalClients', 'totalEmployees', 'totalTask']));
    }

    public function services()
    {
        return view('service.services');
    }

    public function servicesCreate()
    {
        return view('service.servicesCreate');
    }

    public function reports()
    {
        return view('month');
    }

    public function settings()
    {
        return view('general');
    }

}
