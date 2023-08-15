@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3" >
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Tasks</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-9 col-sm-7">
            <h2>Tasks</h2>
        </div>

        <div class="col-md-3 col-sm-5"></div>
    </div>
    <!--Main Content Start-->
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                         A Form to Update a Task
                    </div>

                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('task.createTask') }}" class="form-horizontal form-groups-bordered">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-3" style="padding-left:40px;">
                               <h5><strong>KPI to Complete Task</strong></h5>
                            </div>
                            <div class="col-md-3" style="padding-left:40px;">
                                <h5><strong>KPI to Receive Documents</strong></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> Client </label>
                                    <div class="col-sm-8">
                                        <select name="clients_id" id="client" class="selectboxit">
                                            <optgroup label="Select Client">
                                                <option value="">Select Client</option>

                                                       <option value=""></option>

                                            </optgroup>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Client Service </label>
                                    <div class="col-sm-8">
                                        <select name="service" id="assignedservice" class="clientService" style="width:100%;padding:10px;"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Start Date </label>
                                    <div class="col-sm-8">
                                        <input type="date" id="start_date" name="start_date" min="{{ date('Y-m-d') }}" class="form-control" id="field-1" placeholder="Enter Start date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">End Date </label>
                                    <div class="col-sm-8">
                                        <input type="date" name="end_date" class="form-control" id="field-1" placeholder="End Date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Assign Staff </label>
                                    <div class="col-sm-8">
                                        <select name="employees" id="assignedEmployee" class="selectboxit">
                                                <option value=""><strong>Select Staff</strong></option>
                                                        <option value=""></option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> Track KPI </label>
                                    <div class="col-sm-8">

                                        <select name="job_kpi_enabled" class="selectboxit">
                                                <option><strong>Enable KPI</strong></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Target Days </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="kpi_receive_target_day" class="form-control" id="field-1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Early Points </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="kpi_receive_early_points" class="form-control" id="field-1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Late Points </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="kpi_receive_late_points" class="form-control" id="field-1" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Target Days </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="kpi_complete_target_day" class="form-control" id="field-1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Early Points </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="kpi_complete_early_points" class="form-control" id="field-1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Late Points </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="kpi_complete_late_points" class="form-control" id="field-1" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-right:14px;">
                              <div class="col-sm-12" >
                                <button type="submit" style="float:right;" class="btn btn-primary btn-icon icon-right">
                                     Add Task <i class="entypo-plus"></i>
                                </button>
                              </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
    <!--Main Content Start-->

    <link type="stylesheet" href="">
    <script>
             document.getElementById("start_date").min = new Date().toISOString().split("T")[0];
    </script>
    <script type="text/javascript">

            $(document).ready(function() {
            $('#client').on('change', function() {
            var clientId = this.value;
           $('#assignedservice').html('');
            $.ajax({
                url: '{{ route('getService') }}?clients_id=' + clientId,
                type: 'get',
                success: function(res) {
                    $('#assignedservice').html('<option value="">Select Service</option>');
                        $.each(res, function (key, value) {
                            $('#assignedservice').append('<option value="' + value
                                .id + '">' + value.service_name + '</option>');
                        });
                      }
                   });
                });
            });
        </script>
        <script type="text/javascript">

        /*$(document).ready(function() {
            $('#taskCreateForm').submit(function(event) {
               // Prevent the default form submission

                // Retrieve specific form data
                var client = $('#client').val();
                var service = $('#assignedservice').val();
                var employee = $('#assignedEmployee').val();

                // Prepare the data object
                var formData = {
                    client: client,
                    service: service,
                    employee: employee
                };

                // Send data via Ajax
                $.ajax({
                url: '{{ route('task.tasks') }}?'+formData,
                method: 'GET', // or 'GET' depending on your server-side implementation
                data: formData,
                success: function(response) {
                    console.log(formData);
                },
                error: function(error) {
                    // Handle errors
                }
                });
            });
        });*/

    </script>
@endsection
