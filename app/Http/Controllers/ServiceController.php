<?php

namespace App\Http\Controllers;

use App\Models\Postchecks;
use App\Models\Prechecks;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function services()
    {
        $services = DB::table('services')->orderby('created_at')->get();
        return view('service.services', ['services' => $services]);
    }

    public function store(Request $request)
    {
        $clientservice = new Service();

        $clientservice->service_name               =    $request->service_name;
        $clientservice->description                =    $request->description;
        $clientservice->duedate                    =    $request->duedate;
        $clientservice->repeat                     =    $request->repeat;
        $clientservice->service_kpi                =    $request->service_kpi;
        $clientservice->kpi_receive_target_day     =    $request->kpi_receive_target_day;
        $clientservice->kpi_receive_early_points   =    $request->kpi_receive_early_points;
        $clientservice->kpi_receive_late_points    =    $request->kpi_receive_late_points;
        $clientservice->kpi_complete_target_day    =    $request->kpi_complete_target_day;
        $clientservice->kpi_complete_early_points  =    $request->kpi_complete_early_points;
        $clientservice->kpi_complete_late_points   =    $request->kpi_complete_late_points;

        $clientservice->save();

        //check the value of the service_checklist field
        $precheck_type = $request->input('name');

        if ($precheck_type  == 'PreCheck') {
            $precheck = new Prechecks();
            $precheck->name               =    $request->name;
            $precheck->note               =    $request->note;
            $precheck->multiple_upload    =    $request->multiple_upload;
            $precheck->mandatory          =    $request->mandatory;
            $precheck->description        =    $request->description;
            $precheck->save();
        } elseif ($precheck_type  == 'PostCheck') {
            $postcheck = new Postchecks();

            $postcheck->name               =    $request->name;
            $postcheck->note               =    $request->note;
            $postcheck->multiple_upload    =    $request->multiple_upload;
            $postcheck->mandatory          =    $request->mandatory;
            $postcheck->description        =    $request->description;
            $postcheck->save();
        }
        //redirect the user
        return redirect()->route('service.services');
    }

    public function createServices()
    {
        return view('service.servicesCreate');
    }
    public function edit($id)
    {
        $service = Service::find($id);
        return view('service.editService', compact('service'));
    }
    public function storeupdate(Request $request)
    {
        $serviceupdate = new Service();

        $serviceupdate->service_name               =    $request->service_name;
        $serviceupdate->description                =    $request->description;
        $serviceupdate->duedate                    =    $request->duedate;
        $serviceupdate->repeat                     =    $request->repeat;
        $serviceupdate->service_kpi                =    $request->service_kpi;
        $serviceupdate->kpi_receive_target_day     =    $request->kpi_receive_target_day;
        $serviceupdate->kpi_receive_early_points   =    $request->kpi_receive_early_points;
        $serviceupdate->kpi_receive_late_points    =    $request->kpi_receive_late_points;
        $serviceupdate->kpi_complete_target_day    =    $request->kpi_complete_target_day;
        $serviceupdate->kpi_complete_early_points  =    $request->kpi_complete_early_points;
        $serviceupdate->kpi_complete_late_points   =    $request->kpi_complete_late_points;

        $serviceupdate->save();
        return redirect()->back()->with('message', 'Changes are added successfully!');
    }
}
