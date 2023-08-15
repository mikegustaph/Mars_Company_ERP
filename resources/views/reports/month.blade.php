@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>General Settings</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-9">
            <h2>General Settings</h2>
        </div>
    </div>

    <!-- General Settings -->
    <div class="row">
        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title" style="text-align: left;">
                    Generate Daily Report
                </div>

                <div class="panel-options">
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                </div>
            </div>

            <div class="panel-body">
                <form action="{{ route('createEmployees') }}" method="POST" role="form"
                    class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Monthly Report</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control datepicker" name="site_name" id="field-1"
                                        placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row" style="padding-right:63px;">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" style="float:right;" class="btn btn-success">
                                    Generate <i class="entypo-newspaper"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
