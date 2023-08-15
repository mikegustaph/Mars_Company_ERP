@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong> permission </strong></li>
    </ol>
    <div class="row">
        <div class="col-md-4">
            <h2>Change User Permissions</h2>
        </div>
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
            <form method="POST" action="{{ route('role.setPermission') }}" role="form"
                class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered table-responsive">
                    <div class="form-group" style="display: none;">
                        <input tabindex="5" value="{{ $role->id }}" name="role_id" type="checkbox" class="icheck"
                            id="minimal-checkbox-2" checked>
                    </div>

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
                                @if (in_array('client-view', $all_permission))
                                    <input tabindex="5" value="1" name="client-view" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="client-view" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif

                            </td>
                            <td>
                                @if (in_array('client-add', $all_permission))
                                    <input tabindex="5" value="1" name="client-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="client-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('client-edit', $all_permission))
                                    <input tabindex="5" value="1" name="client-edit" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="client-edit" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('client-delete', $all_permission))
                                    <input tabindex="5" value="1" name="client-edit" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="client-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tasks</td>
                            <td>
                                @if (in_array('task-view', $all_permission))
                                    <input tabindex="5" value="1" name="task-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="task-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('task-add', $all_permission))
                                    <input tabindex="5" value="1" name="task-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="task-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('task-edit', $all_permission))
                                    <input tabindex="5" value="1" name="task-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="task-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('task-delete', $all_permission))
                                    <input tabindex="5" value="1" name="task-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="task-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Services</td>
                            <td>
                                @if (in_array('service-view', $all_permission))
                                    <input tabindex="5" value="1" name="service-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="service-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('service-add', $all_permission))
                                    <input tabindex="5" value="1" name="service-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="service-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('service-edit', $all_permission))
                                    <input tabindex="5" value="1" name="service-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="service-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('service-delete', $all_permission))
                                    <input tabindex="5" value="1" name="service-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="service-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Dispatch</td>
                            <td>
                                @if (in_array('dispatch-view', $all_permission))
                                    <input tabindex="5" value="1" name="dispatch-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="dispatch-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('dispatch-add', $all_permission))
                                    <input tabindex="5" value="1" name="dispatch-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="dispatch-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('dispatch-edit', $all_permission))
                                    <input tabindex="5" value="1" name="dispatch-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="dispatch-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('dispatch-delete', $all_permission))
                                    <input tabindex="5" value="1" name="dispatch-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="dispatch-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Reminder</td>
                            <td>
                                @if (in_array('reminder-view', $all_permission))
                                    <input tabindex="5" value="1" name="reminder-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="reminder-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('reminder-add', $all_permission))
                                    <input tabindex="5" value="1" name="reminder-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="reminder-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('reminder-edit', $all_permission))
                                    <input tabindex="5" value="1" name="reminder-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="reminder-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('reminder-delete', $all_permission))
                                    <input tabindex="5" value="1" name="reminder-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="reminder-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Policies</td>
                            <td>
                                @if (in_array('policies-view', $all_permission))
                                    <input tabindex="5" value="1" name="policies-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="policies-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('policies-add', $all_permission))
                                    <input tabindex="5" value="1" name="policies-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="policies-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('policies-edit', $all_permission))
                                    <input tabindex="5" value="1" name="policies-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="policies-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('policies-delete', $all_permission))
                                    <input tabindex="5" value="1" name="policies-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="policies-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Template</td>
                            <td>
                                @if (in_array('template-view', $all_permission))
                                    <input tabindex="5" value="1" name="template-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="template-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('template-add', $all_permission))
                                    <input tabindex="5" value="1" name="template-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="template-add" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('template-edit', $all_permission))
                                    <input tabindex="5" value="1" name="template-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="template-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('template-delete', $all_permission))
                                    <input tabindex="5" value="1" name="template-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="template-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>People</td>
                            <td>
                                @if (in_array('user-view', $all_permission))
                                    <input tabindex="5" value="1" name="user-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="user-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('user-add', $all_permission))
                                    <input tabindex="5" value="1" name="user-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="user-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('user-edit', $all_permission))
                                    <input tabindex="5" value="1" name="user-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="user-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('user-delete', $all_permission))
                                    <input tabindex="5" value="1" name="user-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="user-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
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
                                @if (in_array('daily-report', $all_permission))
                                    <input tabindex="5" value="1" name="daily-report" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="daily-report" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('weekly-report', $all_permission))
                                    <input tabindex="5" value="1" name="weekly-report" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="weekly-report" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('monthly-report', $all_permission))
                                    <input tabindex="5" value="1" name="monthly-report" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="monthly-report" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('yearly-report', $all_permission))
                                    <input tabindex="5" value="1" name="yearly-report" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="yearly-report" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
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
                            <td>
                                @if (in_array('role-permission', $all_permission))
                                    <input tabindex="5" value="1" name="role-permission" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="role-permission" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('general-setting', $all_permission))
                                    <input tabindex="5" value="1" name="general-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="general-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('profile-setting', $all_permission))
                                    <input tabindex="5" value="1" name="profile-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="profile-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('hrm-setting', $all_permission))
                                    <input tabindex="5" value="1" name="hrm-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="hrm-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
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
