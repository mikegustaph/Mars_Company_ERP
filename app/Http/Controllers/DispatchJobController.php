<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DispatchJob;
use Illuminate\Http\Request;

class DispatchJobController extends Controller
{
    public function listdispatch()
    {
        $dispatch = DispatchJob::all();
        // $clients  = Client::with('clientdispatch')->get();
        return view('dispatch.dispatchdoc', compact('dispatch'));
    }
    public function dispCreate()
    {
        $clients = Client::all();
        return view('dispatch.createDispatch', compact('clients'));
    }
    public function storedispatch(Request $request)
    {
        $dispatchdata = new DispatchJob();

        $dispatchdata->clients_id        =  $request->selected_client;
        $dispatchdata->dispatch_date     =  $request->dispatch_date;
        $dispatchdata->checkout          =  $request->checkout;
        $dispatchdata->narration         =  $request->narration;
        $dispatchdata->custom_desc       =  $request->custom_desc;
        $dispatchdata->custom_check      =  $request->custom_check;
        $dispatchdata->custom_narration  =  $request->custom_narration;
        $dispatchdata->dispatch_note     =  $request->dispatch_note;

        $dispatchdata->save();
        return view('dispatch.dispatchdoc');
    }
    public function viewdispatch($id)
    {
        # code...
    }
}
