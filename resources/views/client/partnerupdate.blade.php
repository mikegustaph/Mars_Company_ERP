@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ url('/home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Add Clients</strong></li>

    </ol>
    <div class="row">
        <div class="col-md-4">
            <h2>Partnership Client Update</h2>
        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><strong>Oohps! </strong>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('message'))
                <div id="flash-message" class="alert alert-success alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Well done! </strong>{{ session('message') }}
                </div>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            $('#flash-message').fadeOut('slow');
                            $('#error-message').fadeOut('slow');
                        }, 5000); // Adjust the timeout value (in milliseconds) as needed
                    });
                </script>
            @endif
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--Form Start-->
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        Partnership Company Details
                    </div>

                    <div class="panel-options">

                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">

                    <form action="{{ url('/partnership/' . $client->id) }}" method="POST" role="form"
                        class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group compnyname" id="compnyname">
                                    <label for="field-1" class="col-sm-4 control-label">Company Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="" class="form-control"
                                            value="{{ $client->name }}" name="name" id="field-1"
                                            placeholder="Enter Company Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Company Address </label>
                                    <div class="col-sm-7">
                                        <input type="text" value="{{ $client->address1 }}" class="form-control"
                                            name="address1" id="field-1" placeholder="Enter Street Address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="plot" id="field-1"
                                            placeholder="Plot No">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="block" id="field-1"
                                            placeholder="Block">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="house" id="field-1"
                                            placeholder="House">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"></label>
                                    <div class="col-sm-7">
                                        <input type="text" value="{{ $client->city }}" class="form-control"
                                            name="city" id="field-1" placeholder="Enter City" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Phone </label>
                                    <div class="col-sm-7">
                                        <input type="tel" value="{{ $client->phone_number }}" class="form-control"
                                            name="phone_number" id="field-1" placeholder="+255756540000" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Email </label>
                                    <div class="col-sm-7">
                                        <input type="email" value="{{ $client->email }}" class="form-control"
                                            name="email" id="field-1" placeholder="clientmail@mail.com" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> TIN </label>
                                    <div class="col-sm-7">
                                        <input type="number" value="{{ $client->tin_number }}" class="form-control"
                                            data-mask="*** *** ***" name="tin_number" id="field-1"
                                            placeholder="000-000-000" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> TIN Certificate </label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" name="tincert" accept=".pdf"
                                            id="field-file" placeholder="Placeholder">
                                    </div>
                                    <a href="{{ Storage::url('public/uploads/' . $client->tinCert) }}"
                                        class="btn btn-primary btn-sm btn-icon icon-left" target="_blank">
                                        <i class="entypo-info"></i> View </a>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">VRN is Available? </label>
                                    <div class="col-sm-1">
                                        <input id="vrn" type="checkbox" onclick="toggleInputs()"
                                            class="form-control" name="vrnAvailable" id="field-file">
                                    </div>
                                </div>
                                <div class="form-group" id="vrnNum" style="display: none;">
                                    <label for="field-1" class="col-sm-4 control-label">VRN </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="vrn" accept=".pdf"
                                            id="field-file" placeholder="Enter VRN">
                                    </div>
                                </div>
                                <div class="form-group" id="vrnAttach" style="display: none;">
                                    <label for="field-1" class="col-sm-4 control-label">Certificate of VAT</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control" name="certVat" accept=".pdf"
                                            id="field-file">
                                    </div>
                                </div>
                                <script>
                                    var checkbox = document.querySelector("#vrn");
                                    var vrnInputs = document.querySelector("#vrnNum");
                                    var vrnFileInput = document.querySelector("#vrnAttach");

                                    function toggleInputs() {
                                        if (checkbox.checked) {
                                            vrnInputs.style.display = "block";
                                            vrnFileInput.style.display = "block";
                                            vrnInputs.style.opacity = "0";
                                            setTimeout(function() {
                                                vrnInputs.style.opacity = "1";
                                            }, 0);
                                        } else {
                                            vrnInputs.style.opacity = "0";
                                            setTimeout(function() {
                                                vrnInputs.style.display = "none";
                                                vrnFileInput.style.display = "none";
                                            }, 500);
                                        }
                                    }
                                </script>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Tax Region </label>
                                    <div class="col-sm-7">
                                        <select name="taxRegion" class="select2" data-allow-clear="true"
                                            data-placeholder="Select Tax Region">
                                            <option></option>
                                            <optgroup label="Select Tax Region">
                                                <option value="">Ilala
                                                </option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Certificate of Reg </label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" value="{{ $client->certReg }}"
                                            name="certReg" accept=".pdf" id="field-file" placeholder="Placeholder">
                                    </div>
                                    <a href="{{ Storage::url('public/uploads/' . $client->CertofReg) }}"
                                        class="btn btn-primary btn-sm btn-icon icon-left" target="_blank">
                                        <i class="entypo-info"></i> View </a>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Certificate of Extract</label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" value="{{ $client->certExtr }}"
                                            name="certExtr" accept=".pdf" id="field-file" placeholder="">
                                    </div>
                                    <a href="{{ Storage::url('public/uploads/' . $client->CertExtr) }}"
                                        class="btn btn-primary btn-sm btn-icon icon-left" target="_blank">
                                        <i class="entypo-info"></i> View </a>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Partnership Deed</label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" name="partnershipDeed" accept=".pdf"
                                            id="field-file">
                                    </div>
                                    <a href="{{ Storage::url('public/uploads/' . $client->partnershipDeed) }}"
                                        class="btn btn-primary btn-sm btn-icon icon-left" target="_blank">
                                        <i class="entypo-info"></i> View </a>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Fiscal Year </label>
                                    <div class="col-sm-7">

                                        <select name="fiscalYear" class="select2" data-allow-clear="true">
                                            <option></option>
                                            <optgroup label="Fiscal">
                                                <option value="">Jan to Dec</option>
                                                <option value="">July to June</option>
                                            </optgroup>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3>Assign Contact Person</h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <button onclick="jQuery('#modal-1').modal('show')" type="button"
                                            style="float:right;" class="btn btn-primary">
                                            Add Shareholder
                                        </button>
                                    </div>
                                </div>
                                <table class="table table-bordered datatable" id="table-4">
                                    <thead>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Shareholding</strong></th>
                                        <th><strong>Percentage</strong></th>
                                    </thead>

                                    <tbody>
                                        @foreach ($contactPerson as $row)
                                            <tr>
                                                <td>{{ $row->personContact->first_name }}</td>
                                                <td>{{ $row->shareholding }}</td>
                                                <td>{{ $row->share_percent }}<span>%</span></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                </div>

            </div>
            <div class="row" style="">
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" id="submit-btn" style="float:right;" class="btn btn-success">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!------ Modal Here -------------->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> Add Shareholder </h4>
                </div>
                <form action="{{ route('client.set-Contact-Person') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Select Contact Person</label>
                                    <div class="col-sm-5">
                                        <select name="contactPerson" class="selectboxit" data-first-option="false"
                                            data-allow-clear="true" data-placeholder="Select Contact Person...">
                                            <option>Select Contact Person</option>
                                            @foreach ($contactPerson as $person)
                                                <option value="{{ $person->id }}">{{ $person->first_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="field-1" class="col-sm-4 control-label"></label>
                                    <div class="col-sm-7">
                                        <input type="text" value="{{ $client->id }}" class="form-control"
                                            name="client" id="field-1">
                                    </div>
                                </div>
                                <br /><br />
                                <div class="form-group">
                                    <label for="field-2" class="col-sm-4 control-label">Shareholding</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="shareholding" step="0.01" class="form-control"
                                            id="field-2" placeholder="Enter Shareholding">
                                    </div>
                                </div>
                                <br /><br />
                                <div class="form-group">
                                    <label for="field-2" class="col-sm-4 control-label">Percent %</label>
                                    <div class="col-sm-5">
                                        <input type="number" name="sharePercent" min="0" max="100"
                                            step="0.01" class="form-control" id="field-2"
                                            placeholder="Enter Percent of share">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
