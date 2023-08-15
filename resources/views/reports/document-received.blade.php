@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong> Document Received</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-9">
            <h2>Document Received</h2>
        </div>
    </div>

    <!-- General Settings -->
    <div class="row">
        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title" style="text-align: left;">
                    Generate Document Received
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
                                <label for="field-1" class="col-sm-4 control-label">Document Received Date</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control datepicker" name="dailyreport" id="field-1"
                                        placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row" style="padding-right:63px;">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit-btn" style="float:right;" class="btn btn-primary">
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
