@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ url('/home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Add Clients</strong></li>


    </ol>
    <div class="row">
        <div class="col-md-3">
            <h2> Company Type</h2>
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
                <div id="flash-message" class="alert alert-danger alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Oohps! </strong>{{ session('message') }}
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
                        A form to select company type
                    </div>

                    <div class="panel-options">

                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">

                    <form id="typeform" action="{{ url('/createClient') }}" method="POST" role="form"
                        class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Select Company Type </label>
                                    <div class="col-sm-6">
                                        <select name="companytype" id="CompanyType" class="companytype selectboxit"
                                            required>
                                            <option disabled selected>Select Company Type</option>
                                            <option value="0">Sole Proprietor</option>
                                            <option value="1">Partnership</option>
                                            <option value="2">Limited</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row" style="padding-right:63px;">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" id="submit-btn" style="float:right;" class="btn btn-success">
                                        Submit <i class="entypo-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('').submit(function(event) {

                var companyType = $('').val();
                // Prepare the data object
                /*var formData = {
                    client: client,
                    service: service,
                    employee: employee
                };*/

                // Send data via Ajax
                $.ajax({
                    url: '{{ route('client.step1post') }}?companytpe_id=' + companyType,
                    type: 'POST', // or 'GET' depending on your server-side implementation
                    // data: formData,
                    success: function(response) {
                        console.log('Well done!');
                    },
                    error: function(error) {
                        alert("Something went wrong!");
                    }
                });
            });
        });
    </script>
@endsection
