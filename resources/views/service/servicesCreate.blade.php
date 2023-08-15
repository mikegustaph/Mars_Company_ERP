@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Create Service</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-9 col-sm-7">
            <h2>Create Services</h2>
        </div>

        <div class="col-md-3 col-sm-5">

            <form method="get" role="form" class="search-form-full">

                <div class="form-group">
                    <input type="text" class="form-control" name="s" id="search-input" placeholder="Search..." />
                    <i class="entypo-search"></i>
                </div>

            </form>

        </div>
    </div>
    <!--Main Content Start-->
    <div class="row">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    A Form to Create New Service
                </div>

                <div class="panel-options">
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" method="POST" action="{{ route('service.createService') }}"
                    class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-3" style="padding-left:40px;">
                            <h5><strong>KPI to Complete Job</strong></h5>
                        </div>
                        <div class="col-md-3" style="padding-left:40px;">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Service Name </label>
                                <div class="col-sm-8">
                                    <input type="text" name="service_name" class="form-control" id="field-1"
                                        placeholder="Enter service name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"> Description </label>
                                <div class="col-sm-8">
                                    <input type="text" name="description" class="form-control" id="field-1"
                                        placeholder="Enter Description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Due Date </label>
                                <div class="col-sm-8">
                                    <input type="number" min="1" max="31" name="duedate" class="form-control"
                                        id="field-1" placeholder="Enter due date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Repeat </label>
                                <div class="col-sm-8">
                                    <select name="repeat" class="selectboxit">
                                        <optgroup label="Repeat">
                                            <option value="none">None</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="annually">Annually</option>


                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-5 control-label"> Target Days </label>
                                <div class="col-sm-3">
                                    <input type="text" name="kpi_complete_target_day" class="form-control" id="field-1"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-5 control-label"> Early Points </label>
                                <div class="col-sm-3">
                                    <input type="text" name="kpi_complete_early_points" class="form-control"
                                        id="field-1" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-5 control-label"> Late Points </label>
                                <div class="col-sm-3">
                                    <input type="text" name="kpi_complete_late_points" class="form-control"
                                        id="field-1" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>

                    <br />
                    <hr />
                    <div class="row">
                        <div class="col-sm-6">
                            <h4><strong>Checklist</strong></h4>
                        </div>
                        <div class="col-sm-6 text-right">
                            <h4>
                                <a id="addrowbtn" class="btn btn-success"><i class="entypo-plus"></i> Add Row</a>
                            </h4>
                        </div>
                    </div>

                    <br />
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
                        //var giCount = 1;

                        /*function fnClickAddRow() {
                            jQuery('#table-2').dataTable().fnAddData( [ '<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount + ".1", giCount + ".2", giCount + ".3", giCount + ".4" ] );
                            replaceCheckboxes(); // because there is checkbox, replace it
                            giCount++;
                        }*/
                        var addformRow = $('#formRow').ready(function() {

                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            // Add row function
                            $('#addrowbtn').click(function() {
                                var newRow = $('<tr>');

                                var typeRow = $('<select>')
                                    .addClass('.selectboxit')
                                    .append(

                                        $('<option>').attr('value', 'postCheck').text('Post Check'),
                                        $('<option>').attr('value', 'preCheck').text('Pre Check')
                                    );
                                var noteRow = $('<input>').attr('type', 'text');
                                var multiRow = $('<select>').append(
                                    $('<option>').attr('value', 'yes').text('Yes'),
                                    $('<option>').attr('value', 'no').text('No')
                                );

                                var descRow = $('<input>').attr('type', 'text');

                                var manRow = $('<select>').append(
                                    $('<option>').attr('value', 'yes').text('Yes'),
                                    $('<option>').attr('value', 'no').text('No'),
                                );
                                //var manRow = $('<td>').html('<select name="mandatory" class="selectboxit"> <optgroup label="Mandatory"><option value="Yes">Yes</option> <option value="No">No</option></optgroup></select>');

                                var actions = $('<td>').html(
                                    '<a class="removeRowBtn btn btn-danger btn-sm btn-icon icon-left"> <i class="entypo-cancel"></i>Cancel</a>'
                                );


                                newRow.append($('<td>').append(typeRow));
                                newRow.append($('<td>').append(noteRow));
                                newRow.append($('<td>').append(multiRow));
                                newRow.append($('<td>').append(manRow));
                                newRow.append($('<td>').append(descRow));
                                newRow.append(actions);

                                $('#table-2 tbody').append(newRow);
                            });

                            // Remove row function
                            $(document).on('click', '.removeRowBtn', function() {
                                $(this).closest('tr').remove();
                            });
                        });
                    </script>
                    <table class="table table-bordered table-striped datatable" id="table-2">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Note</th>
                                <th>Multiple Uploads</th>
                                <th>Mandatory</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="name" class="selectboxit">
                                        <optgroup label="Checklist">
                                            <option value="PostCheck">Post Check</option>
                                            <option value="PreCheck">Pre Check</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td><input type="text" name="note" class="form-control col-sm-2" id="field-2"
                                        placeholder="Check Note"></td>
                                <td>
                                    <select name="multiple_upload" class="selectboxit">
                                        <optgroup label="Multiple Uploads">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td>
                                    <select name="mandatory" class="selectboxit">
                                        <optgroup label="Mandatory">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="description" class="form-control" id="field-2"
                                        placeholder="Description">
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm btn-icon icon-left">
                                        <i class="entypo-cancel"></i>Cancel</a>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                    <br />

                    <div class="row" style="padding-right:14px;">
                        <div class="col-sm-12">
                            <button type="submit" style="float:right;" class="btn btn-primary btn-icon icon-right">
                                Add Service <i class="entypo-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
@endsection
