@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Clients</strong></li>


        <a href="{{ URL::to('createClient') }}" style="float:right;" class="btn btn-primary btn-icon icon-right">
            Add Client <i class="entypo-user-add"></i>
        </a>


    </ol>


    <!-- Member Entries -->

    <!-- Single Member -->
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

    <table class="table table-bordered datatable" id="table-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>TIN</th>
                <th>Type</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $r)
                <tr class="odd gradeX">
                    <td>{{ $r->name }}</td>
                    <td>{{ $r->phone_number }}</td>
                    <td>{{ $r->tin_number }}</td>
                    <td class="center">{{ $r->company_type }}</td>
                    <td class="center">{{ $r->email }}</td>
                    <td class="center">
                        @if ($r->isNew == 'Yes')
                            <div class="col-sm-3">
                                <a href="javascript:void(0)" style="color:rgb(240, 0, 0);"><strong>Pending</strong></a>
                            </div>
                        @elseif ($r->isNew == 'No')
                            @if ($r->status == 'Active')
                                <div class="col-sm-3" style="color:green;">
                                    <a href="javascript:void(0)" style="color:green;"><strong>Active</strong></a>
                                </div>
                            @elseif ($r->status == 'Inactive')
                                <div class="col-sm-3" style="color:grey;">
                                    <a href="javascript:void(0)" style="color:grey;"><strong>Inactive</strong></a>
                                </div>
                            @endif
                        @endif

                    </td>
                    <td class="center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-primary" role="menu">
                                <li><a href="{{ URL::to('/view/' . $r->id) }}">View</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="{{ URL::to('/edit/' . $r->id) }}">Edit</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/passwrdupdate/' . $r->id) }}">
                                        Password
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/clientservice/' . $r->id) }}">
                                        Assign
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>TIN</th>
                <th>Type</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

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
