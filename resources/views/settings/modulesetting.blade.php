@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Module Settings</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-9">
            <h2>Module Settings</h2>
        </div>
    </div>
    <div class="row">
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
    </div>
    <!-- General Settings -->
    <div class="row">
        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title" style="text-align: left;">
                    A Form to Change Module Settings
                </div>

                <div class="panel-options">
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                </div>
            </div>

            <div class="panel-body">
                <form action="" method="POST" role="form" class="form-horizontal form-groups-bordered"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Tax Region</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" value="" name="site_name"
                                        id="field-1" placeholder="Enter Company Name" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" style="padding-right:63px;">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit-btn" style="float:right;" class="btn btn-primary">
                                    Save Changes <i class="entypo-user-add"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
