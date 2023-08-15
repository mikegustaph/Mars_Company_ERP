@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3" >
        <li><a href="index.html"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Dispatch</strong></li>
        <a href="{{ URL::to('createDispatch') }}" type="button" style="float:right;" class="btn btn-primary btn-icon icon-right">
               Add Dispatch <i class="entypo-user-add"></i>
        </a>
    </ol>

        <div class="row">
			<div class="col-md-9 col-sm-7">
				<h2>Dispatch</h2>
			</div>

			<div class="col-md-3 col-sm-5"></div>
		</div>


        <div class="row">
            <div class="col-md-12">
                <!--New Table Start -->

            <script type="text/javascript">
                jQuery( document ).ready( function( $ ) {
                    var $table4 = jQuery( "#table-4" );

                    $table4.DataTable( {
                        dom: 'Bfrtip',
                        buttons: [

                        ]
                    } );
                } );
            </script>

            <table class="table table-bordered datatable" id="table-4">
                <thead>
                    <tr>
                        <th>Created Date</th>
                        <th>Dispatch Date</th>
                        <th>Clients</th>
                        <th>Quantity</th>
                        <th>Created By</th>
                        <th>Action</th>
                        <th>Upload</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($dispatch) > 0)
                       @foreach ($dispatch as $row)
                        <tr class="odd gradeX">
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->dispatch_date }}</td>
                            <td></td>
                            <td>{{ $row->quantity }}</td>
                            <td>Salmaan</td>
                            <td>
                                <a href="{{ url('/viewdispatch/'.$row->id) }}" class="btn btn-primary btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                View
                            </a></td>
                            <td>
                                <div class="checkbox checkbox-replace">
                                <input type="checkbox" id="chk-1">
                            </div></td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th>Created Date</th>
                        <th>Dispatch Date</th>
                        <th>Clients</th>
                        <th>Quantity</th>
                        <th>Created By</th>
                        <th>Action</th>
                        <th>Upload</th>
                    </tr>
                </tfoot>
            </table>

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
