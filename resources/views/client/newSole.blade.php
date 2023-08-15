@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ url('/home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>New Company</strong></li>

    </ol>
    <div class="row">
        <div class="col-md-4">
            <h2>New Company</h2>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">

        </div>

        <div class="col-md-8">
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
    <!--Form Start-->
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        New company detail
                    </div>

                    <div class="panel-options">

                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">

                    <form action="{{ url('/newSole') }}" method="POST" role="form"
                        class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-md-4">
                                <div class="form-group clientname" id="clientname">
                                    <label for="field-1" class="col-sm-4 control-label">Client Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" id="field-1"
                                            placeholder="Enter Client Name" required>
                                    </div>
                                </div>
                                <div class="form-group clientname">
                                    <label for="field-1" class="col-sm-4 control-label">Trading As</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tradeas" id="field-1"
                                            placeholder="Enter Trade Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Phone </label>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control" name="phone_number" id="field-1"
                                            placeholder="+255756540000" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Email </label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email" id="field-1"
                                            placeholder="clientmail@mail.com" required>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="isNew" value="Yes"
                                            id="field-1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                        <div class="row" style="padding-right:63px;">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" id="submit-btn" style="float:right;" class="btn btn-success">
                                        Add Client <i class="entypo-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
    <!------ Modal Here -------------->

    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row" style="padding:30px;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <h4 class="modal-title">Are you sure you want to create a New Company?</h4>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-1">
                            <a style="cursor: pointer;" type="button" class="btn btn-danger" href="#">Yes</a>
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--End Modal-->
@endsection
