@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3" >
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>New Policies</strong></li>

    </ol>
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <h2>Add New Policy</h2>
                </div>
            </div>
            <!--Main Content-->
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
                                <th>Policies Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>
                                    <div class="checkbox checkbox-replace">
                                        <input type="checkbox" id="chk-1">
                                    </div>
                                </td>

                                <td>Employee Policy </td>
                                <td>
                                    <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                                        <i class="entypo-pencil"></i>
                                        View
                                    </a>

                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        <i class="entypo-info"></i>
                                        Manage
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    </div>
            </div>

                    <script type="text/javascript">
                        jQuery( window ).load( function() {
                            var $table2 = jQuery( "#table-2" );

                            // Initialize DataTable
                            $table2.DataTable( {
                                "sDom": "tip",
                                "bStateSave": false,
                                "iDisplayLength": 8,
                                "aoColumns": [
                                    { "bSortable": false },
                                    null,
                                    null,
                                    null,
                                    null
                                ],
                                "bStateSave": true
                            });

                            // Highlighted rows
                            $table2.find( "tbody input[type=checkbox]" ).each(function(i, el) {
                                var $this = $(el),
                                    $p = $this.closest('tr');

                                $( el ).on( 'change', function() {
                                    var is_checked = $this.is(':checked');

                                    $p[is_checked ? 'addClass' : 'removeClass']( 'highlight' );
                                } );
                            } );

                            // Replace Checboxes
                            $table2.find( ".pagination a" ).click( function( ev ) {
                                replaceCheckboxes();
                            } );
                        } );

                        // Sample Function to add new row
                        var giCount = 1;

                        function fnClickAddRow() {
                            jQuery('#table-2').dataTable().fnAddData( [ '<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount + ".1", giCount + ".2", giCount + ".3", giCount + ".4" ] );
                            replaceCheckboxes(); // because there is checkbox, replace it
                            giCount++;
                        }
                        </script>

@endsection
