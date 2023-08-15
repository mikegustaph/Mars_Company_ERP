<?php

namespace App\Http\Controllers;

use App\Models\DispatchJob;
use App\Models\Client;
use App\Models\Client_ContactPerson;
use App\Models\ClientsService;
use App\Models\CompanyType;
use App\Models\ContactPerson;
use App\Models\Service;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function ClientView($id)
    {
        $client = Client::find($id);
        $contactPerson = Client_ContactPerson::with('personContact')->get();
        return view('client.view', compact('client', 'contactPerson'));
    }
    public function clients()
    {
        $result = Client::with('contactPeople')->get();
        return view('client.clients', compact('result'));
    }

    public function createClient()
    {
        return view('client.createClient');
    }

    public function step1(Request $request)
    {
        $compType = $request->input('companytype');
        if ($compType == '0') {
            $comp = 'Sole Proprietor';
            return view('client.soleproprietor', compact('comp'));
        } elseif ($compType == '1') {
            $comp = 'Partnership';
            return view('client.partnership')->with('comp', $comp);
        } elseif ($compType == '2') {
            $comp = 'Limited';
            return view('client.limited')->with('comp', $comp);
        } else {
            return redirect()->route('client.clienttype')->with('message', 'Please select company type!');
        }
    }
    public function step2a()
    {
        return view('client.soleproprietor');
    }
    public function newCompany()
    {
        return view('client.newSole');
    }
    public function newCompanyStore(Request $request)
    {
        $newSole = $request->validate([
            'name'          =>  'required',
            'tradeas'       =>  'required',
            'phone_number'  =>  'required',
            'email'         =>  'required'
        ]);
        $newSole = new Client();
        $newSole->name              =    $request->name;
        $newSole->tradeas           =    $request->tradeas;
        $newSole->phone_number      =    $request->phone_number;
        $newSole->email             =    $request->email;
        $newSole->isNew             =    $request->isNew;
        $newSole->save();
        return redirect()->route('client.contactPerson')->with('message', 'New company was created successfuly');
    }
    public function contactPersonForNewClient()
    {
        return view('client.contactPerson');
    }
    public function newSoleAssignContact(Request $request)
    {
        $assignService = new ContactPerson();
        $assignService->name            =   $request->name;
        //$assignService->save();
        return redirect()->route('client.clients');
    }
    public function newCompanyService()
    {
        $service = Service::all();
        return view('client.servicelist', compact('service'));
    }
    public function newCompanyServiceStore(Request $request)
    {
        $addClient = Client::latest('created_at')->first();
        return redirect()->route('client.clients');
    }

    public function newCompanyPartner()
    {
        return view('client.newPartner');
    }
    public function newCompanyLimited()
    {
        return view('client.newLimited');
    }
    public function step2(Request $request)
    {
        $sole = $request->validate([
            'name'           =>     'required',
            'address1'       =>     'required',
            'plot'           =>     'required',
            'block'          =>     'required',
            'house'          =>      'required',
            'city'           =>     'required',
            'phone_number'   =>     'required|numeric',
            'email'          =>     'required',
            'tin_number'     =>     'required',
            'tincert'        =>     'required|mimes:pdf|max:2048',
            'certReg'        =>     'required|mimes:pdf|max:2048',
            'certExtr'       =>     'required|mimes:pdf|max:2048',
            'certVat'        =>     'required|mimes:pdf|max:2048',
            'vrn'            =>     'required',
        ]);

        if ($request->hasFile('tincert')) {
            $pdfFile = $request->file('tincert');
            $pdfFileName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->storeAs('public/uploads', $pdfFileName);
        }
        if ($request->hasFile('certReg')) {
            $certReg = $request->file('certReg');
            $certRegName =  uniqid() . '.' . $certReg->getClientOriginalExtension();
            $certReg->storeAs('public/uploads', $certRegName);
        }
        if ($request->hasFile('certExtr')) {
            $certExtr = $request->file('certExtr');
            $certExtrName =  uniqid() . '.' . $certExtr->getClientOriginalExtension();
            $certExtr->storeAs('public/uploads', $certExtrName);
        }
        if ($request->hasFile('certVat')) {
            $certVat = $request->file('certVat');
            $certVatName =  uniqid() . '.' . $certVat->getClientOriginalExtension();
            $certVat->storeAs('public/uploads', $certVatName);
        }
        $proprietor = new Client();
        $proprietor->name              =    $request->name;
        $proprietor->tradeas           =    $request->tradeas;
        $proprietor->address1          =    $request->address1;
        $proprietor->block             =    $request->block;
        $proprietor->plot              =    $request->plot;
        $proprietor->house             =    $request->house;
        $proprietor->city              =    $request->city;
        $proprietor->phone_number      =    $request->phone_number;
        $proprietor->email             =    $request->email;
        $proprietor->tin_number        =    $request->tin_number;
        $proprietor->tinCert           =    $pdfFileName;
        $proprietor->vrn               =    $request->vrn;
        $proprietor->certVat           =    $certVatName;
        $proprietor->efin              =    $request->efin;
        $proprietor->efin_password     =    $request->efin_password;
        $proprietor->tax_region        =    $request->taxRegion;
        $proprietor->brelaORS          =    $request->brelaORS;
        $proprietor->CertofReg         =    $certRegName;
        $proprietor->CertExtr          =    $certExtrName;
        $proprietor->memart            =    $request->memart;
        $proprietor->CertRegDate       =    $request->CertRegDate;
        $proprietor->tax_file_location =    $request->tax_file_location;
        $proprietor->fiscal_yr         =    $request->fiscal_yr;
        $proprietor->company_type      =    $request->compType;
        $proprietor->save();
        return redirect()->route('client.passwrd')->with('message', 'New client was created!');
    }
    public function step3()
    {
        return view('client.partnership');
    }
    public function step3process(Request $request)
    {
        $fromForm = $request->validate([
            'name'           =>     'required',
            'address1'       =>     'required',
            'address2'       =>     'required',
            'city'           =>     'required',
            'phone_number'   =>     'required|numeric',
            'email'          =>     'required',
            'tin_number'     =>     'required',
            'tinCert'        =>     'required|mimes:pdf|max:2048',
            'vrn'            =>     'required',
            'certVat'        =>     'required|mimes:pdf|max:2048',
            'certReg'        =>     'required|mimes:pdf|max:2048',
            'certExtr'       =>     'required|mimes:pdf|max:2048',
        ]);
        if ($request->hasFile('tinCert')) {
            $tincert = $request->file('tinCert');
            $tincertName = uniqid() . '.' . $tincert->getClientOriginalExtension();
            $tincert->storeAs('public/upload', $tincertName);
        }
        if ($request->hasFile('certVat')) {
            $certVat = $request->file('certVat');
            $certVatName = uniqid() . '.' . $certVat->getClientOriginalExtension();
            $certVat->storeAs('public/uploads', $certVatName);
        }
        if ($request->hasFile('certReg')) {
            $certReg = $request->file('certReg');
            $certRegName =  uniqid() . '.' . $certReg->getClientOriginalExtension();
            $certReg->storeAs('public/upload', $certRegName);
        }
        if ($request->hasFile('certExtr')) {
            $certExtr = $request->file('certExtr');
            $certExtrName =  uniqid() . '.' . $certExtr->getClientOriginalExtension();
            $certExtr->storeAs('public/upload', $certExtrName);
        }
        $partner = new Client();
        $partner->name              =    $request->name;
        $partner->tradeas           =    $request->tradeas;
        $partner->address1          =    $request->address1;
        $partner->block             =    $request->block;
        $partner->plot              =    $request->plot;
        $partner->house             =    $request->house;
        $partner->city              =    $request->city;
        $partner->phone_number      =    $request->phone_number;
        $partner->email             =    $request->email;
        $partner->tin_number        =    $request->tin_number;
        $partner->tinCert           =    $tincertName;
        $partner->vrn               =    $request->vrn;
        $partner->certVat           =    $certVatName;
        $partner->efin              =    $request->efin;
        $partner->efin_password     =    $request->efin_password;
        $partner->tax_region        =    $request->taxRegion;
        $partner->brelaORS          =    $request->brelaORS;
        $partner->CertofReg         =    $certRegName;
        $partner->CertRegDate       =    $request->CertRegDate;
        $partner->certExtr          =    $certExtrName;
        $partner->tax_file_location =    $request->tax_file_location;
        $partner->fiscal_yr         =    $request->fiscal_yr;
        $partner->company_type       =    $request->compType;
        $partner->save();
        return redirect('/passwrd');
    }
    public function step4()
    {
        return view('client.limited');
    }
    public function step4process(Request $request)
    {
        $fromForm = $request->validate([
            'name'              =>     'required',
            'address1'          =>     'required',
            'address2'          =>     'required',
            'city'              =>     'required',
            'phone_number'      =>     'required|numeric',
            'email'             =>     'required',
            'tin_number'        =>     'required',
            'tinCert'           =>     'required|mimes:pdf|max:2048',
            'certVat'           =>     'required|mimes:pdf|max:2048',
            'certIncorporation' =>     'required|mimes:pdf|max:2048',
            'memart'            =>     'required|mimes:pdf|max:2048',
            'fiscalYear'        =>     'required',
        ]);
        if ($request->hasFile('tinCert')) {
            $tincert = $request->file('tinCert');
            $tincertName = uniqid() . '.' . $tincert->getClientOriginalExtension();
            $tincert->storeAs('public/upload', $tincertName);
        }
        if ($request->hasFile('certVat')) {
            $certVat = $request->file('certVat');
            $certVatName =  uniqid() . '.' . $certVat->getClientOriginalExtension();
            $certVat->storeAs('public/upload', $certVatName);
        }
        if ($request->hasFile('memart')) {
            $memart = $request->file('memart');
            $memartName =  uniqid() . '.' . $memart->getClientOriginalExtension();
            $memart->storeAs('public/upload', $memartName);
        }
        if ($request->hasFile('certIncorporation')) {
            $certInc = $request->file('certIncorporation');
            $certIncName =  uniqid() . '.' . $certInc->getClientOriginalExtension();
            $certInc->storeAs('public/upload', $certIncName);
        }

        $limited = new Client();
        $limited->name              =    $request->name;
        $limited->tradeas           =    $request->tradeas;
        $limited->address1          =    $request->address1;
        $limited->block             =    $request->block;
        $limited->plot              =    $request->plot;
        $limited->house             =    $request->house;
        $limited->city              =    $request->city;
        $limited->phone_number      =    $request->phone_number;
        $limited->email             =    $request->email;
        $limited->tin_number        =    $request->tin_number;
        $limited->tinCert           =    $tincertName;
        $limited->vrn               =    $request->vrn;
        $limited->certVat           =    $certVatName;
        $limited->efin              =    $request->efin;
        $limited->efin_password     =    $request->efin_password;
        $limited->tax_region        =    $request->taxRegion;
        $limited->brelaORS          =    $request->brelaORS;
        $limited->CertRegDate       =    $request->CertRegDate;
        $limited->CertExtr          =    $certIncName;
        //limited->tax_file_location =    $request->tax_file_locationlimited
        $limited->memart            =    $memartName;
        $limited->fiscal_yr         =    $request->fiscal_yr;
        $limited->company_type      =    $request->compType;
        $limited->save();
        return redirect('/passwrd');
    }
    public function edit($id)
    {
        $client        = Client::find($id);
        //$contactPerson = ContactPerson::all();
        $contactPerson = Client_ContactPerson::with('clientsContact')->get();

        $compType = $client->company_type;
        if ($compType == 'Sole Proprietor') {
            return view('client.soleproprietorupdate', compact('client', 'contactPerson'));
        } elseif ($compType == 'Partnership') {

            return view('client.partnerupdate', compact('client', 'contactPerson'));
        } elseif ($compType == 'Limited') {

            return view('client.limitedupdate', compact('client', 'contactPerson'));
        } else {
            return redirect()->back();
        }
    }
    public function updateSole(Request $request, $id)
    {
        $sole = $request->validate([
            'clientname'     =>     'required',
            'address1'       =>     'required',
            'address2'       =>     'required',
            'city'           =>     'required',
            'phone_number'   =>     'required|numeric',
            'email'          =>     'required',
            'tin_number'     =>     'required',
            'tincert'        =>     'required|mimes:pdf|max:2048',
            'certReg'        =>     'required|mimes:pdf|max:2048',
            'certExtr'       =>     'required|mimes:pdf|max:2048',
            'vrn'            =>     'required'
        ]);
        $clients = Client::find($id);

        $proprietor = new Client();

        //new
        if ($request->hasFile('tincert')) {
            $pdfFile = $request->file('tincert');
            $pdfFileName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->storeAs('public/uploads', $pdfFileName);
        }
        if ($request->hasFile('certReg')) {
            $certReg = $request->file('certReg');
            $certRegName =  uniqid() . '.' . $certReg->getClientOriginalExtension();
            $certReg->storeAs('public/uploads', $certRegName);
        }
        if ($request->hasFile('certExtr')) {
            $certExtr = $request->file('certExtr');
            $certExtrName =  uniqid() . '.' . $certExtr->getClientOriginalExtension();
            $certExtr->storeAs('public/uploads', $certExtrName);
        }
        if ($request->hasFile('certVat')) {
            $certVat = $request->file('certVat');
            $certVatName =  uniqid() . '.' . $certVat->getClientOriginalExtension();
            $certVat->storeAs('public/uploads', $certVatName);
        }
        $proprietor->name              =    $request->name;
        $proprietor->tradeas           =    $request->tradeas;
        $proprietor->address1          =    $request->address1;
        $proprietor->block             =    $request->block;
        $proprietor->plot              =    $request->plot;
        $proprietor->house             =    $request->house;
        $proprietor->city              =    $request->city;
        $proprietor->phone_number      =    $request->phone_number;
        $proprietor->email             =    $request->email;
        $proprietor->tin_number        =    $request->tin_number;
        $proprietor->tinCert           =    $pdfFileName;
        $proprietor->vrn               =    $request->vrn;
        $proprietor->certVat           =    $certVatName;
        $proprietor->efin              =    $request->efin;
        $proprietor->efin_password     =    $request->efin_password;
        $proprietor->tax_region        =    $request->taxRegion;
        $proprietor->brelaORS          =    $request->brelaORS;
        $proprietor->CertofReg         =    $certRegName;
        $proprietor->CertExtr          =    $certExtrName;
        $proprietor->memart            =    $request->memart;
        $proprietor->CertRegDate       =    $request->CertRegDate;
        $proprietor->tax_file_location =    $request->tax_file_location;
        $proprietor->fiscal_yr         =    $request->fiscal_yr;
        $proprietor->contactPerson_id  =    $request->contactPerson;
        $proprietor->company_type      =    $request->compType;

        $proprietor->update();
        return redirect()->back()->with('message', 'Changes saved successfully!');
    }
    public function updatePartner(Request $request)
    {
        $fromForm = $request->validate([
            'name'           =>     'required',
            'address1'       =>     'required',
            'address2'       =>     'required',
            'city'           =>     'required',
            'phone_number'   =>     'required|numeric',
            'email'          =>     'required',
            'tin_number'     =>     'required',
            'tinCert'        =>     'required|mimes:pdf|max:2048',
            'vrn'            =>     'required',
            'certVat'        =>     'required|mimes:pdf|max:2048',
            'certReg'        =>     'required|mimes:pdf|max:2048',
            'certExtr'       =>     'required|mimes:pdf|max:2048',
        ]);
        if ($request->hasFile('tinCert')) {
            $tincert = $request->file('tinCert');
            $tincertName = uniqid() . '.' . $tincert->getClientOriginalExtension();
            $tincert->storeAs('public/upload', $tincertName);
        }
        if ($request->hasFile('certVat')) {
            $certVat = $request->file('certVat');
            $certVatName = uniqid() . '.' . $certVat->getClientOriginalExtension();
            $certVat->storeAs('public/uploads', $certVatName);
        }
        if ($request->hasFile('certReg')) {
            $certReg = $request->file('certReg');
            $certRegName =  uniqid() . '.' . $certReg->getClientOriginalExtension();
            $certReg->storeAs('public/upload', $certRegName);
        }
        if ($request->hasFile('certExtr')) {
            $certExtr = $request->file('certExtr');
            $certExtrName =  uniqid() . '.' . $certExtr->getClientOriginalExtension();
            $certExtr->storeAs('public/upload', $certExtrName);
        }
        $partner = new Client();
        $partner->name              =    $request->name;
        $partner->tradeas           =    $request->tradeas;
        $partner->address1          =    $request->address1;
        $partner->block             =    $request->block;
        $partner->plot              =    $request->plot;
        $partner->house             =    $request->house;
        $partner->city              =    $request->city;
        $partner->phone_number      =    $request->phone_number;
        $partner->email             =    $request->email;
        $partner->tin_number        =    $request->tin_number;
        $partner->tinCert           =    $tincertName;
        $partner->vrn               =    $request->vrn;
        $partner->certVat           =    $certVatName;
        $partner->efin              =    $request->efin;
        $partner->efin_password     =    $request->efin_password;
        $partner->tax_region        =    $request->taxRegion;
        $partner->brelaORS          =    $request->brelaORS;
        $partner->CertofReg         =    $certRegName;
        $partner->CertExtr          =    $certExtrName;
        $partner->memart            =    $request->memart;
        $partner->CertRegDate       =    $request->CertRegDate;
        $partner->tax_file_location =    $request->tax_file_location;
        $partner->fiscal_yr         =    $request->fiscal_yr;
        $partner->contactPerson_id  =    $request->contactPerson;
        $partner->company_type      =    $request->compType;
        $partner->update();
        return redirect()->back()->with('message', 'Changes saved successfully!');
    }
    public function updateLimited(Request $request)
    {
        $sole = $request->validate([
            'name'           =>     'required',
            'address1'       =>     'required',
            'address2'       =>     'required',
            'city'           =>     'required',
            'phone_number'   =>     'required|numeric',
            'email'          =>     'required',
            'tin_number'     =>     'required',
            'tincert'        =>     'required|mimes:pdf|max:2048',
            'certReg'        =>     'required|mimes:pdf|max:2048',
            'certExtr'       =>     'required|mimes:pdf|max:2048',

        ]);
        $proprietor = new Client();
        if ($request->hasFile('tincert')) {
            $tincert = $request->input('tincert');
            $tincertName = uniqid() . '.' . $tincert->getClientOriginalExtension();
            $tincert->storeAs('public/upload', $tincertName);
        }
        if ($request->input('certVat')) {
            $certVat = $request->input('certVat');
            $certVatName = uniqid() . '.' . $certVat->getClientOriginalExtension();
            $certVat->storeAs('public/upload', $certVatName);
        }
        if ($request->hasFile('certReg')) {
            $certReg = $request->input('certReg');
            $certRegName =  uniqid() . '.' . $certReg->getClientOriginalExtension();
            $certReg->storeAs('public/upload', $certRegName);
        }
        if ($request->hasFile('certExtr')) {
            $certExtr = $request->input('certExtr');
            $certExtrName =  uniqid() . '.' . $certExtr->getClientOriginalExtension();
            $certExtr->storeAs('public/upload', $certExtrName);
        }
        $proprietor->name              =    $request->name;
        $proprietor->tradeas           =    $request->tradeas;
        $proprietor->address1          =    $request->address1;
        $proprietor->block             =    $request->block;
        $proprietor->plot              =    $request->plot;
        $proprietor->house             =    $request->house;
        $proprietor->city              =    $request->city;
        $proprietor->phone_number      =    $request->phone_number;
        $proprietor->email             =    $request->email;
        $proprietor->tin_number        =    $request->tin_number;
        $proprietor->tinCert           =    $tincertName;
        $proprietor->vrn               =    $request->vrn;
        $proprietor->certVat           =    $certVatName;
        $proprietor->efin              =    $request->efin;
        $proprietor->efin_password     =    $request->efin_password;
        $proprietor->tax_region        =    $request->taxRegion;
        $proprietor->brelaORS          =    $request->brelaORS;
        $proprietor->CertofReg         =    $certRegName;
        $proprietor->CertExtr          =    $certExtrName;
        $proprietor->memart            =    $request->memart;
        $proprietor->CertRegDate       =    $request->CertRegDate;
        $proprietor->tax_file_location =    $request->tax_file_location;
        $proprietor->fiscal_yr         =    $request->fiscal_yr;
        $proprietor->company_type      =    $request->compType;
        $proprietor->update();
        return redirect()->back()->with('message', 'Changes saved successfully!');
    }
    public function addService(Request $request)
    {
        $assignservice = new ClientsService();

        $assignservice->clients_services = json_encode($request->assignservice);
        //$assignservice->clients_services = implode(',',$request->input('assignservice')) ;
        //$assignservice->interests = $request->input('assignservice');
        $assignservice->save();
        return redirect()->route('client.clients');
    }
    public function clientService($id)
    {
        $clients  = Client::find($id);
        $services = Service::all();

        $result = DB::table('client_services')
            ->join('services', 'client_services.services_id', '=', 'services.id')
            ->select('client_services.*', 'services.service_name')
            ->where('client_services.clients_id', $id)
            ->get();

        return view('client.clientservice', compact('clients', 'services', 'result'));
    }
    public function assignService(Request $request)
    {
        $servSelected = $request->input('client_service');
        $servServed = ClientsService::pluck('services_id');
        if (in_array($servSelected, $servServed->toArray())) {
            $valid = $request->validate([
                'client_service' => 'required|in:selected'
            ], [
                'client_service.in' => 'Service already selected!'
            ]);
            return redirect()->back();
        } else {
            $assignService = new ClientsService();
            $assignService->clients_id      =  $request->input('client');
            $assignService->services_id     =  $servSelected;
            // $assignService->service_repeat  =  $request->input('repeat');
            // $assignService->schedule_start  =  $request->input('startdate');
            //  $assignService->schedule_end    =  $request->input('startdate');
            $assignService->save();
            return redirect()->back()->with('message', 'Successfully service was assigned!');
        }
    }
    public function getsole($id)
    {
        $clients = Client::with('clients')->find($id);
    }
}
