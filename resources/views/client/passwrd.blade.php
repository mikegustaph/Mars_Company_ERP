@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ url('/home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Add Clients</strong></li>

    </ol>
    <!--Form Start-->
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        Portals UserID & Password
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">

                    <form action="{{ route('client.passwrd') }}" method="POST" role="form"
                        class="form-horizontal form-groups-bordered">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Taxpayer Portal Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tra_portal_name" id="field-1"
                                            placeholder="Enter portal name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Taxpayer TIN</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tra_portal_tin" id="field-1"
                                            placeholder="Enter taxpayer tin" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Taxpayer Portal Password</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tax_portal_passwrd" id="field-1"
                                            placeholder="Enter portal password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Tax Payment TIN</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tax_portal_tin" id="field-1"
                                            placeholder="Enter tax payment tin" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Payment Password </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="payment_passwrd" id="field-1"
                                            placeholder="Enter payment password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">BRELA Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="brela_name" id="field-1"
                                            placeholder="Enter brela name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">BRELA UserID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="brela_userid" id="field-1"
                                            placeholder="Enter brela userid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">BRELA Password</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="brela_passwrd" id="field-1"
                                            placeholder="Enter brela password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">NSSF UserID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="nssf_userid" id="field-1"
                                            placeholder="Enter nssf userid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">NSSF Password</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="nssf_passwrd" id="field-1"
                                            placeholder="Enter nssf password">
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $addClient->id }}"
                                            name="clientId" id="field-1" placeholder="">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Efin UserID </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="efin_userid" id="field-1"
                                            placeholder="Enter EFIN" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Efin Password </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="efin_passwrd" id="field-1"
                                            placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">WCF UserID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="wcf_userid" id="field-1"
                                            placeholder="Enter wcf userid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">WCF Password</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="wcf_passwrd" id="field-1"
                                            placeholder="Enter wcf password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">WCF Incident Notification
                                        Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="wcf_ic_name" id="field-1"
                                            placeholder="Enter wcf name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">WCF Incident Notification
                                        UserID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="wcf_ic_userid" id="field-1"
                                            placeholder="Enter wcf name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">WCF Incident Notification
                                        Password</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="wcf_ic_passwrd" id="field-1"
                                            placeholder="Enter wcf name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Beneficial Ownership</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="bo_name" id="field-1"
                                            placeholder="Enter name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:63px;">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" id="submit-btn" style="float:right;" class="btn btn-primary">
                                        Add Details <i class="entypo-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
