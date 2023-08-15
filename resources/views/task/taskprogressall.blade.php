@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Tasks update</strong></li>
    </ol>

    <div class="row">
        <div class="col-md-9 col-sm-7">
            <h2>Tasks Progress</h2>
        </div>

        <div class="col-md-3 col-sm-5"></div>
    </div>
    <!--Main Content-->
    <div class="row">
        <div class="col-md-12">

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

                        <th>Employee</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>Salmaan</td>
                        <td>
                            <div class="panel-body">

                                <h5>Task Progress 40%</h5>

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>

                        <th>Employee</th>
                        <th>Status</th>

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
                    <h4 class="modal-title">Assign Service to Client</h4>
                </div>

                <div class="modal-body">
                    Cooming Soon!
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">

    <!-- Imported scripts on this page -->
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/neon-chat.js"></script>
@endsection
