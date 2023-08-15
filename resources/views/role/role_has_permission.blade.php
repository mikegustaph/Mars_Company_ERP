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
