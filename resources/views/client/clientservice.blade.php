@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3">
        <li><a href="{{ url('/home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Assign Service</strong></li>

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
                        Manage Client Service
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    @if (!empty($clients))
                        <div class="member-entry">
                            <div class="member-details">
                                <h4>
                                    <a href="javascript:void(0)">{{ $clients->name }}</a>
                                </h4>
                                <!-- Details with Icons -->
                                <div class="row info-list">
                                    <div class="col-sm-3">
                                        <i class="entypo-user"></i>
                                        <a href="javascript:void(0)">{{ $clients->contactPeople->first_name ?? null }} </a>
                                    </div>
                                    @if ($clients->status == 'Active')
                                        <div class="col-sm-3" style="color:green;">
                                            <i class="entypo-record" href="javascript:void(0)"></i>
                                            Status: <a href="javascript:void(0)" style="color:green;">Active</a>
                                        </div>
                                    @elseif ($clients->status == 'Inactive')
                                        <div class="col-sm-3" style="color:grey;">
                                            <i class="entypo-record"></i>
                                            Status: <a href="javascript:void(0)" style="color:grey;">Inactive</a>
                                        </div>
                                    @endif
                                    <div class="col-sm-3">
                                        <i class="entypo-mail"></i>
                                        <a href="javascript:void(0)">{{ $clients->email }}</a>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <!-- <a href="{{ url('/edit/' . $clients->id) }}" style="padding-right:5px;" class="btn btn-primary btn-sm btn-icon icon-left">
                                                                                                                                                                                                                                                            <i class="entypo-pencil"></i>
                                                                                                                                                                                                                                                            Manage Client
                                                                                                                                                                                                                                                        </a> -->
                                    </div>
                                    <div class="col-sm-3">
                                        <a onclick="jQuery('#modal-1').modal('show')" type="button"
                                            class="btn btn-info btn-sm btn-icon icon-left">
                                            <i class="entypo-info"></i>
                                            Assign Service
                                        </a>
                                    </div>

                                    <div class="clear"></div>
                                    <div class="col-sm-3">
                                        <i class="entypo-location"></i>
                                        <a href="javascript:void(0)">{{ $clients->address1 }}</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <i class="glyphicon glyphicon-earphone"></i>
                                        <a href="javascript:void(0)">{{ $clients->phone_number }}</a>
                                    </div>
                                    <div class="col-sm-2">
                                        <i class="entypo-doc-text"></i>
                                        TIN: <a href="javascript:void(0)">{{ $clients->tin_number }}</a>
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
                                    @foreach ($result as $row)
                                        <tr>
                                            <td>
                                                <div class="checkbox checkbox-replace">
                                                    <input type="checkbox" id="chk-1">
                                                </div>
                                            </td>
                                            <td>{{ $row->service_name }}</td>
                                            <td>{{ $row->schedule_start }}</td>
                                            <td>{{ $row->schedule_end }}</td>
                                            <td>{{ $row->service_repeat }}</td>
                                            <td>
                                                @if ($row->status == 'Activate')
                                                    <span style="color:green;"><strong> Active </strong><span>
                                                        @elseif ($row->status == 'Deactivate')
                                                            <span
                                                                style="color:rgb(123, 123, 123);"><strong>Inactive</strong></span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

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
                    <h4 class="modal-title"> Assign Service </h4>
                </div>
                <form id="assignForm" action="{{ route('client.addservice') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" style="padding:43px;">
                                <div class="form-group" style="display: none;">
                                    <label for="field-1" class="control-label">Client</label>
                                    <select name="client" class="selectboxit">
                                        <optgroup label="Clients">
                                            <option value="{{ $clients->id }}">{{ $clients->name }}</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="icheck-list">
                                                @php
                                                    $halfCount = ceil(count($services) / 2);
                                                @endphp
                                                @foreach ($services as $index => $row)
                                                    @if ($index < $halfCount)
                                                        <li>
                                                            <input tabindex="5" value="{{ $row->id }}"
                                                                name="client_service" type="checkbox" class="icheck"
                                                                id="minimal-checkbox-{{ $row->id }}">
                                                            <label
                                                                for="minimal-checkbox-{{ $row->id }}">{{ $row->service_name }}</label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="icheck-list">
                                                @php
                                                    $halfCount = ceil(count($services) / 2);
                                                @endphp
                                                @foreach ($services as $index => $row)
                                                    @if ($index >= $halfCount)
                                                        <li>
                                                            <input tabindex="5" value="{{ $row->id }}"
                                                                name="client_service" type="checkbox" class="icheck"
                                                                id="minimal-checkbox-{{ $row->id }}">
                                                            <label
                                                                for="minimal-checkbox-{{ $row->id }}">{{ $row->service_name }}</label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!--client service - First Column-->

                                    <!--client service - Second Column-->

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
                <script>
                    $(document).ready(function() {
                        $("").submit(function() {
                            var formData = $(this).serialize();
                            $.ajax({
                                type: "POST",
                                url: "{{ route('client.addservice') }}",
                                data: formData,
                                success: function(response) {
                                    if (response.status == "success") {
                                        $('modal-1').modal('hide');
                                    }
                                    //error: function(){
                                    //    console.log('Error: ', response);
                                    //  }
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('input.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal'
            });

            $('input.icheck-2').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });


        jQuery(document).ready(function($) {
            var icheck_skins = $(".icheck-skins a");

            icheck_skins.click(function(ev) {
                ev.preventDefault();

                icheck_skins.removeClass('current');
                $(this).addClass('current');

                updateiCheckSkinandStyle();
            });

            $("#icheck-style").change(updateiCheckSkinandStyle);
        });

        function updateiCheckSkinandStyle() {
            var skin = $(".icheck-skins a.current").data('color-class'),
                style = $("#icheck-style").val();

            var cb_class = 'icheckbox_' + style + (skin.length ? ("-" + skin) : ''),
                rd_class = 'iradio_' + style + (skin.length ? ("-" + skin) : '');

            if (style == 'futurico' || style == 'polaris') {
                cb_class = cb_class.replace('-' + skin, '');
                rd_class = rd_class.replace('-' + skin, '');
            }

            $('input.icheck-2').iCheck('destroy');
            $('input.icheck-2').iCheck({
                checkboxClass: cb_class,
                radioClass: rd_class
            });
        }
    </script>
    <script src="{{ url('assets/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/joinable.js') }}"></script>
    <script src="{{ url('assets/js/resizeable.js') }}"></script>
    <script src="{{ url('assets/js/neon-api.js') }}"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ url('assets/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ url('assets/js/neon-chat.js') }}"></script>


    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">
    <link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">
    <link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/minimal/_all.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/square/_all.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/flat/_all.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/futurico/futurico.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/polaris/polaris.css">


    <!-- Imported scripts on this page -->
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/typeahead.min.js"></script>
    <script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/daterangepicker/daterangepicker.js"></script>
    <script src="assets/js/jquery.multi-select.js"></script>
    <script src="assets/js/icheck/icheck.min.js"></script>

@endsection
