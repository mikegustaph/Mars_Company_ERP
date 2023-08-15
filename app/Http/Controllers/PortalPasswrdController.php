<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\portalpassword;
use Illuminate\Http\Request;

class PortalPasswrdController extends Controller
{
    public function index()
    {
        $addClient = Client::latest('created_at')->first();
        return view('client.passwrd', compact('addClient'));
    }
    public function store(Request $request)
    {
        $pwdportal = new portalpassword();
        $pwdportal->client_id          =   $request->clientId;
        $pwdportal->tra_portal_name    =   $request->tra_portal_name;
        $pwdportal->tra_portal_tin     =   $request->tra_portal_tin;
        $pwdportal->tax_portal_passwrd =   $request->tax_portal_passwrd;
        $pwdportal->tax_portal_tin     =   $request->tax_portal_tin;
        $pwdportal->payment_passwrd    =   $request->payment_passwrd;
        $pwdportal->brela_name         =   $request->brela_name;
        $pwdportal->brela_userid       =   $request->brela_userid;
        $pwdportal->brela_passwrd      =   $request->brela_passwrd;
        $pwdportal->nssf_userid        =   $request->nssf_userid;
        $pwdportal->nssf_passwrd       =   $request->nssf_passwrd;
        $pwdportal->efin_userid        =   $request->efin_userid;
        $pwdportal->efin_passwrd       =   $request->efin_passwrd;
        $pwdportal->wcf_name           =   $request->wcf_name;
        $pwdportal->wcf_userid         =   $request->wcf_userid;
        $pwdportal->wcf_passwrd        =   $request->wcf_passwrd;
        $pwdportal->wcf_ic_name        =   $request->wcf_ic_name;
        $pwdportal->wcf_ic_userid      =   $request->wcf_ic_userid;
        $pwdportal->wcf_ic_passwrd     =   $request->wcf_ic_passwrd;
        $pwdportal->bo_name            =   $request->bo_name;
        $pwdportal->bo_userid          =   $request->lasbo_useridtId;
        $pwdportal->bo_passwrd         =   $request->bo_passwrd;

        $pwdportal->save();
        return redirect()->route('client.assign-service');
    }
    public function updateview($id)
    {
        $pwdupdate = portalpassword::find($id);
        return view('client.passwrdupdate', compact('pwdupdate'));
    }
    public function updatedate()
    {
        return view();
    }
}
