@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3">
        <li><a href="{{ url('/home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>View</strong></li>

    </ol>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
    <!--Form Start-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        View Client
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    @if (!empty($client))
                        <div class="member-entry">
                            <div class="member-details">
                                <h4>
                                    <a href="#">{{ $client->name }}</a>
                                </h4>
                                <!-- Details with Icons -->
                                <div class="row info-list">
                                    <div class="col-sm-3">
                                        <i class="entypo-user"></i>
                                        @foreach ($contactPerson as $r)
                                            <a href="javascript:void(0)"
                                                style="text-transform: capitalize;">{{ $r->personContact->first_name }}
                                            </a>
                                        @endforeach
                                    </div>
                                    @if ($client->status == 'Active')
                                        <div class="col-sm-3" style="color:green;">
                                            <i class="entypo-record" href="javascript:void(0)"></i>
                                            Status: <a href="javascript:void(0)" style="color:green;">Active</a>
                                        </div>
                                    @elseif ($client->status == 'Inactive')
                                        <div class="col-sm-3" style="color:grey;">
                                            <i class="entypo-record"></i>
                                            Status: <a href="javascript:void(0)" style="color:grey;">Inactive</a>
                                        </div>
                                    @endif
                                    <div class="col-sm-3">
                                        <i class="entypo-mail"></i>
                                        <a href="#">{{ $client->email }}</a>
                                    </div>
                                    <div class="col-sm-3 text-right"></div>
                                    <div class="col-sm-3">
                                        <a onclick="jQuery('#modal-1').modal('show')" type="button"
                                            class="btn btn-danger btn-sm">Suspend Client
                                        </a>
                                    </div>

                                    <div class="clear"></div>
                                    <div class="col-sm-3">
                                        <i class="entypo-location"></i>
                                        <a href="#">{{ $client->address1 }}</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <i class="glyphicon glyphicon-earphone"></i>
                                        <a href="#">{{ $client->phone_number }}</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <i class="entypo-doc-text"></i>
                                        TIN: <a href="#">{{ $client->tin_number }}</a>
                                    </div>
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <br>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped datatable" id="table-2">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="checkbox checkbox-replace">
                                                <input type="checkbox" id="chk-1">
                                            </div>
                                        </th>
                                        <th><strong>Service Name</strong></th>
                                        <th><strong>Start Date</strong></th>
                                        <th><strong>End Date</strong></th>
                                        <th><strong>Repeat</strong></th>
                                        <th><strong>Status</strong></th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="checkbox checkbox-replace">
                                                <input type="checkbox" id="chk-1">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(window).load(function() {
            var $table2 = jQuery("#table-2");

            // Initialize DataTable
            $table2.DataTable({
                "sDom": "tip",
                "bStateSave": false,
                "iDisplayLength": 8,
                "aoColumns": [{
                        "bSortable": false
                    },
                    null,
                    null,
                    null,
                    null
                ],
                "bStateSave": true
            });

            // Highlighted rows
            $table2.find("tbody input[type=checkbox]").each(function(i, el) {
                var $this = $(el),
                    $p = $this.closest('tr');

                $(el).on('change', function() {
                    var is_checked = $this.is(':checked');

                    $p[is_checked ? 'addClass' : 'removeClass']('highlight');
                });
            });

            // Replace Checboxes
            $table2.find(".pagination a").click(function(ev) {
                replaceCheckboxes();
            });
        });

        // Sample Function to add new row
        var giCount = 1;

        function fnClickAddRow() {
            jQuery('#table-2').dataTable().fnAddData([
                '<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount + ".1", giCount +
                ".2", giCount + ".3", giCount + ".4"
            ]);
            replaceCheckboxes(); // because there is checkbox, replace it
            giCount++;
        }
    </script>
    <!------ Modal Here -------------->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row" style="padding:30px;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <h4 class="modal-title text-center">Are you sure you want to suspend a this client?</h4>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-1">
                            <a style="cursor: pointer;" type="button" class="btn yes-btn btn-danger"
                                href="#">Yes</a>
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
    <script src="{{ url('assets/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/joinable.js') }}"></script>
    <script src="{{ url('assets/js/resizeable.js') }}"></script>
    <script src="{{ url('assets/js/neon-api.js') }}"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ url('assets/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ url('assets/js/neon-chat.js') }}"></script>
@endsection
