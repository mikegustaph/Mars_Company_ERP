@extends('layouts.app')

@section('content')

					<ol class="breadcrumb bc-3" >
						<li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
						<li class="active"><strong>Template</strong></li>
                        <button onclick="jQuery('#modal-1').modal('show')" type="button" style="float:right;" class="btn btn-primary btn-icon icon-right">
                               Add Template <i class="entypo-plus"></i>
                        </button>
					</ol>

		<div class="row">
			<div class="col-md-9 col-sm-7">
				<h2>Template</h2>
			</div>

			<div class="col-md-3 col-sm-5"></div>
		</div>
        <!--Script for the table-->
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


                            <th>Template Files</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @if (count($templates) > 0)
                    @foreach ($templates as $row)
                          <tr>
                                <td>
                                    <div class="checkbox checkbox-replace">
                                        <input type="checkbox" id="chk-1">
                                    </div>
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    <a href="{{ Storage::url('public/files/'.$row->file) }}" class="btn btn-primary btn-sm btn-icon icon-left" download>
                                        <i class="entypo-download"></i>
                                        Download
                                    </a>
                                </td>

                            </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
      </div>


<!------ Modal Here -------------->
<div class="modal fade" id="modal-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Add New Template </h4>
            </div>
        <form action="{{ url('/addtemplate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
               <div class="row">
                <div class="col-md-12" style="padding:43px;">

                    <div class="form-group">
                        <label for="field-1" class="control-label">Name</label>
                        <input type="text" name="name" class="form-control" id="field-1" placeholder="Template Name">
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="control-label">Description</label>
                        <input type="text" name="description" class="form-control" id="field-1" placeholder="Template Description">
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="control-label">File</label>
                        <input type="file" name="file" accept=".pdf" class="form-control" id="field-2" placeholder="">

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

