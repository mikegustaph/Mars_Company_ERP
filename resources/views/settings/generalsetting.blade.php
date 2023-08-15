@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>General Settings</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-9">
            <h2>General Settings</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><strong> Oohps! </strong>{{ $error }}</li>
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
                    A Form to Change General Settings
                </div>

                <div class="panel-options">
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                </div>
            </div>

            <div class="panel-body">
                <form action="{{ url('/settingupdate/' . $setting->id) }}" method="POST" role="form"
                    class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Company Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" value="{{ $setting->site_name }}"
                                        name="site_name" id="field-1" placeholder="Enter Company Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Phone Number</label>
                                <div class="col-sm-7">
                                    <input type="tel" class="form-control" value="{{ $setting->phone }}" name="phone"
                                        id="field-1" placeholder="Enter Phone Number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" value="{{ $setting->email }}" name="email"
                                        id="field-1" placeholder="Enter Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label">Logo</label>
                                <div class="col-sm-7">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 150px; height: 60px;"
                                            data-trigger="fileinput">
                                            <img src="http://placehold.it/150x60" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                            style="max-width: 200px; max-height: 150px"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="logo" accept="image/*">
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists"
                                                data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Favicon</label>
                                <div class="col-sm-7">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 40px; height: 40px;"
                                            data-trigger="fileinput">
                                            <img src="http://placehold.it/40x40" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                            style="max-width: 200px; max-height: 150px"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="favicon" accept="image/*">
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists"
                                                data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Footer </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" value="{{ $setting->footer }}"
                                        name="footer" id="field" placeholder="Footer Text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Address</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" value="{{ $setting->address }}"
                                        name="address" placeholder="Address">
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
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/dropzone/dropzone.css">

    <!-- Imported scripts on this page -->
    <script src="assets/js/fileinput.js"></script>
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/neon-chat.js"></script>
@endsection
