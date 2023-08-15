@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong> permission </strong></li>
    </ol>
    <div class="row">
        <div class="col-md-9">
            <h2>Change User Permissions</h2>
        </div>
    </div>
    <!-- General Settings -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title" style="text-align: center;">Admin Group Permission</div>
                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                        <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="" role="form" class="form-horizontal form-groups-bordered"
                enctype="multipart/form-data">
                <table class="table table-bordered table-responsive">
                    <form method="POST" action="" role="form" class="form-horizontal form-groups-bordered"
                        enctype="multipart/form-data">
                        @csrf
                        <thead>
                            <tr>
                                <th><strong>Module Name</strong></th>
                                <th><strong>View</strong></th>
                                <th><strong>Add</strong></th>
                                <th><strong>Edit</strong></th>
                                <th><strong>Delete</strong></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Client</td>
                                <td>
                                    <input tabindex="5" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="5" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="5" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="5" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                            </tr>
                            <tr>
                                <td>Tasks</td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                            </tr>
                            <tr>
                                <td>Services</td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" name="service-delete" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                </td>
                            </tr>
                            <tr>
                                <td>Dispatch</td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2" checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                            </tr>
                            <tr>
                                <td>Reminder</td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                            </tr>
                            <tr>
                                <td>Policies</td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                            </tr>
                            <tr>
                                <td>Template</td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                            </tr>
                            <tr>
                                <td>People</td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <td></td>
                                <td><strong>Daily Reports</strong></td>
                                <td><strong>Weekly Report</strong></td>
                                <td><strong>Monthly Report</strong> </td>
                                <td><strong>Yearly Report</strong> </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Reports</td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                                <td>
                                    <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked>
                                </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <td></td>
                                <td><strong>Role Permission</strong></td>
                                <td><strong>General Setting</strong></td>
                                <td><strong>Profile Setting </strong></td>
                                <td><strong>Hrm Setting </strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Settings</td>
                                <td><input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked></td>
                                <td> <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked></td>
                                <td> <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked></td>
                                <td> <input tabindex="6" type="checkbox" class="icheck" id="minimal-checkbox-2"
                                        checked></td>
                            </tr>
                        </tbody>
                </table>
        </div>
    </div>
    <div class="row" style="padding-right:0;">
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" id="submit-btn" style="float:right;" class="btn btn-success">
                    Save Changes
                </button>
            </div>
            </form>
        </div>
    </div>
@endsection
