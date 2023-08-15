@extends('layouts.app')

@section('content')


    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Create Employee</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-4 col-sm-7">
            <h2>Create Employee</h2>
        </div>

        <div class="col-md-8 col-sm-5">
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
    </div>
    <!--Main Content Start-->
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <div class="panel panel-primary" data-collapsed="0">
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel-heading">
            <div class="panel-title">
                A Form to Create New Employee
            </div>

            <div class="panel-options">
                <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
            </div>
        </div>

        <div class="panel-body">
            <form action="{{ route('createEmployees') }}" method="POST" role="form"
                class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="first_name" id="field-1"
                                    placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Middle Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="middle_name" id="field-1"
                                    placeholder="Middle Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="last_name" id="field-1"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Photo 128x128</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="images" accept=".png, .jpg, .jpeg"
                                    id="field-file" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> CV </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="cv" accept=".pdf" id="field-file"
                                    placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Contract </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="contract" accept=".pdf" id="field-file"
                                    placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Application </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="application" accept=".pdf" id="field-file"
                                    placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Offer Letter </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="offerletter" accept=".pdf"
                                    id="field-file" placeholder="Placeholder">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Joining Date </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control datepicker" name="joining_date" id="field-1"
                                    placeholder="mm/dd/yyyy" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Termination </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control datepicker" name="termination" id="field-1"
                                    placeholder="mm/dd/yyyy">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Phone </label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" name="phone" id="field-1"
                                    placeholder="+255756540000" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Email </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" id="field-1"
                                    placeholder="clientmail@mail.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Position </label>
                            <div class="col-sm-8">

                                <select name="position" class="selectboxit">
                                    <optgroup label="Employee Position">

                                        <option value="Junior accountant">Junior Accountant</option>
                                        <option value="Senior accountant">Senior Accountant</option>
                                        <option value="Assistant auditor">Assistant Auditor</option>
                                        <option value="Senior auditor">Senior Auditor</option>
                                        <option value="tax manager">Tax Manager</option>
                                        <option value="tax associate">Tax Associate</option>

                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Contract Period(Years) </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="contract_period" id="field-1"
                                    placeholder="Select Your Contract Period">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> TIN Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tin" id="field-1"
                                    placeholder="Enter TIN Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> NIDA</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tin" id="field-1"
                                    placeholder="Enter NIDA Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> NSSF Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nssf" id="field-1"
                                    placeholder="Enter NSSF Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Username </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" id="field-1"
                                    placeholder="Employee Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Password </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="password" id="field-1"
                                    placeholder="Employee Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label"> Status </label>
                            <div class="col-sm-8">

                                <select name="status" class="selectboxit">
                                    <optgroup label="status">

                                        <option value="Active">Active</option>
                                        <option value="Retired">Retired</option>
                                        <option value="Inactive">Suspended</option>

                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-right:63px;">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" id="submit-btn" style="float:right;" class="btn btn-primary">
                                Add Employee <i class="entypo-user-add"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!--Main Content Start-->

@endsection
