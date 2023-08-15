@extends('layouts.app')

@section('content')

					<ol class="breadcrumb bc-3" >
						<li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
						<li class="active"><strong>HRM Settings</strong></li>

					</ol>

		<div class="row">
			<div class="col-md-9 col-sm-7">
				<h2>HRM Settings</h2>
			</div>
        </div>

        <!-- General Settings -->
        <div class="row">
            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title" style="text-align: left;">
                       A Form to Change HRM Settings
                    </div>

                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    <form action="{{ route('createEmployees') }}" method="POST" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                          @csrf
                      <div class="row">
                          <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="field-1" class="col-sm-3 control-label">Default CheckIn</label>
                                      <div class="col-sm-5">
                                          <input type="time" value="08:00" class="form-control" name="site_name" id="field-1" placeholder="Company Name" required>
                                      </div>
                                  </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Default CheckOut</label>
                                <div class="col-sm-5">
                                    <input type="time" value="17:00" class="form-control" min="09:00" max="18:00" name="site_name" id="field-1" placeholder="Company Name" required>
                                </div>
                            </div>
                           </div>

                      </div>
                      <div class="row" style="padding-right:63px;">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit-btn" style="float:right;" class="btn btn-primary">
                                    Save Changes <i class="entypo-user-add"></i>
                                </button>
                            </div>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
@endsection

