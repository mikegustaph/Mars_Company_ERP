@extends('layouts.app')

@section('content')

        <ol class="breadcrumb bc-3" >
            <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
            <li class="active"><strong>Profile Settings</strong></li>

        </ol>

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
                                    <a href="#">John Henderson</a>
                                    <a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Online"></a>
                                    <!-- User statuses available classes "is-online", "is-offline", "is-idle", "is-busy" -->						</strong>
                                <span><a href="#">Co-Founder at Mars</a></span>
                            </div>
                        </li>

                        <li>
                            <div class="profile-stat">
                                <h3>Phone Number</h3>
                                <span><a href="#">+255760560000</a></span>
                            </div>
                        </li>

                        <li>
                            <div class="profile-stat">
                                <h3>Email</h3>
                                <span><a href="#">admin@mars.com</a></span>
                            </div>
                        </li>
                    </ul>

                </div>

                <div class="col-sm-3">


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


@endsection

