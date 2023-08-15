@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Reminder</strong></li>

        <a href="{{ URL::to('calendar') }}" type="button" style="float:right;margin-left:4px;"
            class="btn btn-primary btn-icon icon-right">
            Calender <i class="entypo-calendar"></i>
        </a>

        <a onclick="jQuery('#modal-1').modal('show')" type="button" style="float:right;"
            class="btn btn-primary btn-icon icon-right">
            Add Reminder<i class="entypo-user-add"></i>
        </a>

    </ol>

    <div class="row">
        <div class="col-md-9 col-sm-7">
            <h2>Reminder</h2>
        </div>

        <div class="col-md-3 col-sm-5"></div>
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

    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered datatable" id="table-4">
                <thead>
                    <tr>

                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reminders as $r)
                        <tr>

                            <td>{{ $r->name }}</td>
                            <td>{{ $r->description }}</td>
                            <td>{{ $r->date }}</td>
                            <td> @php
                                $reminderDate = $r->date;
                                $reminderTime = $r->time;
                            @endphp
                                @if ($reminderDate > $dateNow || ($reminderDate == $dateNow && $reminderTime > $timeNow))
                                    <span class="badge badge-info badge-roundless" style="border-radius:3px;">
                                        Upcoming</span>
                                @else
                                    <span class="badge badge-danger badge-roundless"
                                        style="border-radius:3px;">Reached</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-primary" role="menu">
                                        <li><a onclick="jQuery('#modal-2').modal('show')">Edit</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ url('/passwrdupdate/' . $r->id) }}">
                                                Complete
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ url('/clientservice/' . $r->id) }}">
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>


            </table>

        </div>
    </div>



    <!------ Modal one create reminder here -------------->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Create Reminder </h4>
                </div>
                <form id="reminderForm" method="post" action="{{ route('reminder.reminder') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" style="padding:43px;">

                                <div class="form-group">
                                    <label for="field-1" class="control-label">Title</label>
                                    <input type="text" name="name" class="form-control" id="field-1"
                                        placeholder="Reminder Title">
                                </div>
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Description</label>
                                    <!--<textarea class="form-control" id="field-2" cols="6" rows="4">
                        </textarea>-->
                                    <textarea name="description" class="form-control" id="field-ta" placeholder="Reminder Description"></textarea>
                                </div>
                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="field-2" class="control-label">Date</label>
                                            <input type="date" min="{{ date('Y-m-d') }}" name="date"
                                                style="z-index:1600 !important;" class="form-control" id="field-2"
                                                placeholder="DD/MM/YYYY">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="field-2" class="control-label">Time </label>
                                            <input type="time" name="time" class="form-control" id="field-2"
                                                id="field-2" min="00:00" max="24:00" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Repeat</label>
                                    <select name="frequency" class="selectboxit">
                                        <optgroup label="Please Select">
                                            <option value="none">Never</option>
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </optgroup>
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-2"></div>
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

    <!-- Modal two update reminder here-->

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
