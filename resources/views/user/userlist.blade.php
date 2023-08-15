@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Policies</strong></li>
        <a href="{{ URL::to('adduser') }}" type="button" style="float:right;" class="btn btn-primary btn-icon icon-right">
            Add User<i class="entypo-user-add"></i>
        </a>
    </ol>

    <div class="row">
        <div class="col-md-3">
            <h2>Users</h2>
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
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var $table4 = jQuery("#table-4");

            $table4.DataTable({
                dom: 'Bfrtip',
                buttons: [

                ]
            });
        });
    </script>
    <!--Main Content-->
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered datatable" id="table-4">
                <thead>
                    <tr>
                        <th>
                            <div class="checkbox checkbox-replace">
                                <input type="checkbox" id="chk-1">
                            </div>
                        </th>
                        <th>Username </th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user as $row)
                        <tr>
                            <td>
                                <div class="checkbox checkbox-replace">
                                    <input type="checkbox" id="chk-1">
                                </div>
                            </td>

                            <td>{{ $row->name }}</td>

                            @if (empty($row->roleuser->name))
                                <td> @php
                                    echo '<span style="font-weight:100;color:rgb(237, 0, 0);">No Role,Please add Role!</span>';
                                @endphp</td>
                            @else
                                <td>{{ $row->roleuser->name }}</td>
                            @endif

                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-primary" role="menu">
                                        <li><a href="{{ URL::to('/edituser/' . $row->id) }}">Edit</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a style="cursor: pointer" onclick="jQuery('#modal-1').modal('show');"
                                                type="button">Delete</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="{{ URL::to('/change-permission/' . $row->id) }}">Change Permission</a>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <div class="checkbox checkbox-replace">
                                <input type="checkbox" id="chk-1">
                            </div>
                        </th>
                        <th> User</th>
                        <th> Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

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
                            <h4 class="modal-title">Are you sure you want to delete this user?</h4>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-1">
                            <a style="cursor: pointer;" type="button" class="btn btn-danger"
                                href="{{ URL::to('/deleteuser/' . $row->id) }}">Yes</a>
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
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">

    <!-- Bottom scripts (common) -->
    <script src="assets/js/gsap/TweenMax.min.js"></script>
    <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/joinable.js"></script>
    <script src="assets/js/resizeable.js"></script>
    <script src="assets/js/neon-api.js"></script>

    <!-- Imported scripts on this page -->
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/neon-chat.js"></script>
@endsection
