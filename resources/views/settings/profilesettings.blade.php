@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Profile Settings</strong></li>

    </ol>
    <hr />
    <div class="profile-env">

        <header class="row">

            <div class="col-sm-2">

                <a href="#" class="profile-picture">
                    <img src="assets/images/profile-picture.png" class="img-responsive img-circle" />
                </a>

            </div>

            <div class="col-sm-7">

                <ul class="profile-info-sections">
                    <li>
                        <div class="profile-name">
                            <strong>
                                <a href="#">Art Ramadani</a>
                                <a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip"
                                    data-placement="top" data-original-title="Online"></a>
                                <!-- User statuses available classes "is-online", "is-offline", "is-idle", "is-busy" -->
                            </strong>
                            <span><a href="#">Co-Founder at Laborator</a></span>
                        </div>
                    </li>

                    <li>
                        <div class="profile-stat">
                            <h3>643</h3>
                            <span><a href="#">followers</a></span>
                        </div>
                    </li>

                    <li>
                        <div class="profile-stat">
                            <h3>108</h3>
                            <span><a href="#">following</a></span>
                        </div>
                    </li>
                </ul>

            </div>

            <div class="col-sm-3">

                <div class="profile-buttons">
                    <a href="#" class="btn btn-default">
                        <i class="entypo-user-add"></i>
                        Follow
                    </a>

                    <a href="#" class="btn btn-default">
                        <i class="entypo-mail"></i>
                    </a>
                </div>
            </div>

        </header>

        <section class="profile-info-tabs">

            <div class="row">

                <div class="col-sm-offset-2 col-sm-10">

                    <ul class="user-details">
                        <li>
                            <a href="#">
                                <i class="entypo-location"></i>
                                Prishtina
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="entypo-suitcase"></i>
                                Works as <span>Laborator</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="entypo-calendar"></i>
                                16 October
                            </a>
                        </li>
                    </ul>


                    <!-- tabs for the profile links -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile-info">Profile</a></li>
                        <li><a href="#biography">Bio</a></li>
                        <li><a href="#profile-edit">Edit Profile</a></li>
                    </ul>

                </div>

            </div>

        </section>
    </div>
    <!-- user Settings -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title" style="text-align: left;">
                        A Form to Change Profile Settings
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
                                        <input type="text" class="form-control" name="fname" id="field-1"
                                            placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Last Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="lname" id="field-1"
                                            placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" id="field-1"
                                            placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="tel" class="form-control" name="phone" id="field-1"
                                            placeholder="Enter Phone Number" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Profile Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="profImage"
                                            accept=".png, .jpg, .jpeg" id="field-file" placeholder="">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div style="padding-left:20px;">
                                    <h4>Change Login Detail</h4>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Email </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="footer" id="field"
                                            placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label"> Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Confirm Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="confirmPassword"
                                            placeholder="Confirm Password">
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
    </div>
    <!-- Bottom scripts (common) -->
    <script src="assets/js/gsap/TweenMax.min.js"></script>
    <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/joinable.js"></script>
    <script src="assets/js/resizeable.js"></script>
    <script src="assets/js/neon-api.js"></script>


    <!-- Imported scripts on this page -->
    <script src="assets/js/neon-chat.js"></script>
@endsection
