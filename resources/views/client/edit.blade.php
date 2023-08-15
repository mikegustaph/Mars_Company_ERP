@extends('layouts.app')

@section('content')

					<ol class="breadcrumb bc-3" >
						<li><a href="{{ url('/home')}}"><i class="fa-home"></i>Home</a></li>
						<li class="active"><strong>Update Clients</strong></li>

					</ol>
    <!--Form Start-->
<section>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                       Update Client
                    </div>

                    <div class="panel-options">

                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">

                    <form action="{{ url('/update-client/'.$clients->id) }}" method="POST" role="form" class="form-horizontal form-groups-bordered">
                        @csrf
                        @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Client Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $clients->name }}" name="name" id="field-1" placeholder="Enter Company Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Company Address </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $clients->address1 }}" name="address1" id="field-1" placeholder="Enter Street Address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control"  value="{{ $clients->address2 }}" name="address2" id="field-1" placeholder="Enter Plot No, Block, House No">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $clients->city }}" name="city" id="field-1" placeholder="Enter City" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> Phone </label>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control" value="{{ $clients->phone_number }}" name="phone_number" id="field-1" placeholder="+255756540000" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> Email </label>
                                    <div class="col-sm-7">
                                        <input type="email" value="{{ $clients->email }}"  class="form-control" name="email" id="field-1" placeholder="clientmail@mail.com" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> TIN </label>
                                    <div class="col-sm-7">
                                        <input type="number" value="{{ $clients->tin_number }}" class="form-control" name="tin_number" id="field-1" placeholder="00-00-00-00" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> TIN Certificate </label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control" name="tincert" accept=".pdf" id="field-file" placeholder="Placeholder">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> VRN </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="vrn" id="field-1" placeholder="Enter VRN">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> VRN Certificate </label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control" name="vrnCert" accept=".pdf" id="field-file" placeholder="Placeholder">
                                    </div>
                                </div>


                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Efin </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="efin" id="field-1" placeholder="Enter EFIN" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Efin Password </label>
                                <div class="col-sm-7">
                                    <input type="text" value="{{ $clients->efinPassword }}" class="form-control" name="efinPassword" id="field-1" placeholder="Enter Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Tax Region </label>
                                <div class="col-sm-7">
                                    <input type="text" value="{{ $clients->taxRegion }}" class="form-control" name="taxRegion" id="field-1" placeholder="Enter Region">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Brela ORS User </label>
                                <div class="col-sm-7">
                                    <input type="text" value="{{ $clients->brelaOrs }}" class="form-control" name="brelaOrs" id="field-1" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Certificate of Reg </label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" name="certReg" accept=".pdf" id="field-file" placeholder="Placeholder">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Cert of Reg Date Issued </label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="certRegDate" id="field-1" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Company logo </label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" id="logo-img" name="images" accept=".jpg,.jpeg,.png" id="field-file" placeholder="Placeholder">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Tax File Location </label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" name="taxFileLocation" id="field-file" placeholder="Placeholder">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Fiscal Year </label>
                                <div class="col-sm-7">
                                    <input type="number" min="1900" max="2099" class="form-control " name="fiscalYear" id="field-1" placeholder="Enter year (e.g., 2023)">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"> Company Type </label>
                                <div class="col-sm-7">
                                    <input type="year" class="form-control" name="companyType" id="field-1" placeholder="YYYY">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" style="padding-right:63px;">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" id="submit-btn" style="float:right;" class="btn btn-primary">
                                    Update Client <i class="entypo-user-add"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>

            </div>

        </div>
    </div>


</section>


@endsection
