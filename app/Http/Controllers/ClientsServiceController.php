<?php

namespace App\Http\Controllers;

use App\Models\ClientsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsServiceController extends Controller
{

  public function assignService(Request $request)
  {
     //$assignservice = new ClientsService();

     //$assignservice->services_id = $request->assignservice;

    // $assignservice->save();

  }
  public function getAssignedService(Request $request)
  {

        $service = DB::table('client_services')
            ->join('services', 'client_services.services_id', '=', 'services.id')
            ->select('services.*')
            ->where('client_services.clients_id', $request->clients_id)
            ->get();

        if (count($service) > 0) {
            return response()->json($service);
        }
    }
}


