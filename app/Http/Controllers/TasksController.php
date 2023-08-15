<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientsService;
use App\Models\Tasks;
use App\Models\Employee;
use App\Models\RecieveDoc;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function taskjob(Request $request)
    {

        $tasks = Tasks::with('client.clientserv.serv', 'employee')->get();
        $filteredTasks = $tasks->filter(function ($task) {
            return $task->client && $task->client->clientserv && $task->client->clientserv->serv;
        });

        return view('task.tasks', compact('filteredTasks'));
    }

    public function addemployee()
    {
    }

    public function create()
    {
        $employees = Employee::all();
        $client = Client::all();
        $clientservice = ClientsService::all();
        return view('task.createTask', compact(['employees', 'clientservice', 'client']));
    }

    public function store(Request $request)
    {
        $task = new Tasks();

        $task->clients_id                            =    $request->clients_id;
        $task->employee_id                           =    $request->employees;
        $task->services_id                           =    $request->service;
        $task->start_date                            =    $request->start_date;
        $task->end_date                              =    $request->end_date;
        $task->job_date_documents_received_precheck  =    $request->job_date_documents_received_precheck;
        $task->job_kpi_enabled                       =    $request->job_kpi_enabled;
        $task->job_kpi_deadline_to_receive_document  =    $request->job_kpi_deadline_to_receive_document;
        $task->job_date_documents_receive            =    $request->job_date_documents_receive;
        $task->job_kpi_points_to_receive_documents   =    $request->job_kpi_points_to_receive_documents;
        $task->job_kpi_deadline_to_complete          =    $request->job_kpi_deadline_to_complete;
        $task->job_kpi_points_to_complete_job        =    $request->job_kpi_points_to_complete_job;
        //$task->job_status                          =    $request->job_status;

        $task->save();
        return redirect()->route('task.createTask');
    }

    public function receiveDoc($id)
    {
        return view('task.receivedoc');
    }

    public function documents($id)
    {
        $tasks = Tasks::with('client.clientserv.serv', 'employee')->get();
        foreach ($tasks as $t) {
            return view('task.receivedoc', compact('t'));
        }
    }
    public function receivedocStore(Request $request)
    {
        /*$validate = $request->validate([
            'dateReceived'   =>  'required',
            'note'           =>  'required',
            'quantity'       =>  'required',
            'fileType'       =>  'required',
            'narration'      =>  '',
        ]);*/

        $receiveDoc = new RecieveDoc();
        $receiveDoc->task_id       =    $request->taskNo;
        $receiveDoc->client_id     =    $request->client;
        $receiveDoc->service_id    =    $request->service;
        $receiveDoc->dateReceived  =    $request->dateReceived;
        $receiveDoc->note          =    $request->note;
        $receiveDoc->quantity      =    $request->quantity;
        $receiveDoc->fileType      =    $request->fileType;
        $receiveDoc->narration     =    $request->narration;

        $receiveDoc->save();
        return redirect()->back()->with('message', 'Your successfully Receive Document!');
    }
    public function documentsstore($id)
    {
        return view('task.receivedoc');
    }
    public function updateview($id)
    {
        $tasks = Tasks::with('client.clientserv.serv', 'employee')->get();
        foreach ($tasks as $row) {
            return view('task.update', compact('row'));
        }
    }

    public function activate(Request $request)
    {
    }

    public function taskuser()
    {
        return view('task.tasksUser');
    }
    public function taskprogressall()
    {
        return view('task.taskprogressall');
    }
    public function taskProg()
    {
        return view('task.taskprogress');
        //echo 'We got stuck';
    }
}
