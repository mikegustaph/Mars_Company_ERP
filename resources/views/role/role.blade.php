@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong> Role</strong></li>
        <button onclick="jQuery('#modal-1').modal('show')" type="button" style="float:right;"
            class="btn btn-primary btn-icon icon-right">
            Add Role<i class="entypo-user-add"></i>
        </button>
    </ol>

    <div class="row">
        <div class="col-md-3">
            <h2>Roles</h2>
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
    </div>

    <!-- Role -->
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
                        <th><strong>Role Name </strong></th>
                        <th><strong>Description</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($roleResult->isEmpty())
                        <tr>
                            <td>
                                <div class="checkbox checkbox-replace">
                                    <input type="checkbox" id="chk-1">
                                </div>
                            </td>
                            <td>
                                No Record Found.!
                            </td>
                            <td></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-primary" role="menu">
                                        <li><a style="cursor: pointer;"
                                                onclick="jQuery('#modal-2').modal('show')"><strong>Edit</strong></a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ URL::to('permission') }}"><strong>Change Permission</strong></a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($roleResult as $row)
                            <tr>
                                <td>
                                    <div class="checkbox checkbox-replace">
                                        <input type="checkbox" id="chk-1">
                                    </div>
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-primary" role="menu">
                                            <li><a style="cursor: pointer;"
                                                    onclick="jQuery('#modal-2').modal('show')"><strong>Edit</strong></a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="{{ URL::to('/change-permission/' . $row->id) }}"><strong>Change
                                                        Permission</strong></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <div class="checkbox checkbox-replace">
                                <input type="checkbox" id="chk-1">
                            </div>
                        </th>
                        <th><strong>Role Name </strong></th>
                        <th><strong>Description</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>

    <!------ Modal Here For Add New Role -------------->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> Add Role </h4>
                </div>
                <form action="{{ route('role.index') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" style="padding:43px;">

                                <div class="form-group">
                                    <label for="field-1" class="control-label">Role Name</label>
                                    <input type="text" name="rolename" class="form-control" id="field-1"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Description</label>
                                    <input type="text" name="description" class="form-control" id="field-1"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="field-1" class="control-label">Guard name</label>
                                    <input type="text" name="guard_name" value="guard_name" class="form-control"
                                        id="field-1" placeholder="Enter Name" required>
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

    <!------ Modal Here For Update Role -------------->
    <div class="modal fade" id="modal-2">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> Update Role </h4>
                </div>
                @if ($roleResult->isEmpty())
                    <div class="col-sm-12" style="padding: 40px;background:white;">
                        <h4 class="modal-title"> <span style="color: red;">Ooohps!</span> No data to Update!</h4>
                    </div>
                @else
                    @foreach ($roleResult as $row)
                        <form action="{{ url('/role-update/' . $row->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12" style="padding:43px;">

                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Role Name</label>
                                            <input type="text" name="rolename" class="form-control" id="field-1"
                                                placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Description</label>
                                            <input type="text" name="description" class="form-control" id="field-1"
                                                placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label for="field-1" class="control-label">Guard name</label>
                                            <input type="text" name="guard_name" value="guard_name"
                                                class="form-control" id="field-1" placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    @endforeach
                @endif

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
