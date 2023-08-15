<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Client_ContactPerson;
use App\Models\ContactPerson;
use Illuminate\Http\Request;

class ContactPersonController extends Controller
{
    public function addContactPerson()
    {
        $clientId = Client::latest('created_at')->first();
        return view('client.createContactPerson', compact('clientId'));
    }

    public function store(Request $request)
    {

        $contact  = $request->validate([
            'first_name'    =>  'required',
            'middle_name'   =>  'required',
            'last_name'     =>  'required',
            'phone'         =>  'required',
            'email'         =>  'required',
            'tin'           =>  'required',
            'passport'      =>  'required|regex:/^TAE\d{6}$/',
            'passportcopy'  =>  'required|mimes:jpg,jpeg,pdf|max:2048',
            'nida'          =>  'required',
            'nidacopy'      =>  'required|mimes:jpg,jpeg,pdf|max:2048'

        ]);
        if ($request->hasFile('passportcopy')) {
            $passportcopy = $request->file('passportcopy');
            $passportcopyName =  uniqid() . '.' . $passportcopy->getClientOriginalExtension();
            $passportcopy->storeAs('public/uploads', $passportcopyName);
        }
        if ($request->hasFile('nidacopy')) {
            $nidacopy = $request->file('nidacopy');
            $nidacopyName =  uniqid() . '.' . $nidacopy->getClientOriginalExtension();
            $nidacopy->storeAs('public/uploads', $nidacopyName);
        }

        $contactPerson = new ContactPerson();

        //$contactPerson->client_id     =    $request->clientId;
        $contactPerson->first_name      =    $request->first_name;
        $contactPerson->middle_name     =    $request->middle_name;
        $contactPerson->last_name       =    $request->last_name;
        //$contactPerson->position      =    $request->position;
        $contactPerson->phone           =    $request->phone;
        $contactPerson->email           =    $request->email;
        $contactPerson->tin             =    $request->tin;
        //$contactPerson->nationality   =    $request->nationality;
        //$contactPerson->director      =    $request->director;
        $contactPerson->radio           =    $request->radio;
        $contactPerson->passport        =    $request->passport;
        $contactPerson->passportcopy    =    $passportcopyName;
        $contactPerson->nida            =    $request->nida;
        $contactPerson->nidacopy        =    $nidacopyName;

        $contactPerson->save();
        return redirect()->back()->with('message', 'Successfuly create new contact person!');
    }
    public function AssignContactPerson(Request $request)
    {
        $contactPerson = new Client_ContactPerson();

        $contactPerson->client_id       =   $request->client;
        $contactPerson->contact_people_id = $request->contactPerson;
        $contactPerson->shareholding    =   $request->shareholding;
        $contactPerson->share_percent   =   $request->sharePercent;
        $contactPerson->save();
        return redirect()->back()->with('message', 'Successfully Assign Contact Person!');
    }
    public function AssignContactPersonLimited(Request $request)
    {
        $contactPerson = new Client_ContactPerson();

        $contactPerson->client_id       =   $request->client;
        $contactPerson->contact_people_id = $request->contactPerson;
        $contactPerson->shareholding    =   $request->shareholding;
        $contactPerson->share_percent   =   $request->sharePercent;
        $contactPerson->save();
        return redirect()->back()->with('message', 'Successfully Assign Contact Person!');
    }
}
